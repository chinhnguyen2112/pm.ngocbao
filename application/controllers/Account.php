<?php
error_reporting(1);
defined('BASEPATH') or exit('No direct script access allowed');
class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->database();
        $this->load->helper(['url', 'func_helper', 'images']);
        $this->load->library(['session', 'pagination311', 'upload']);
        if (admin()) {
            $g_admin = $this->Madmin->get_by(['id' => $_SESSION['user']['id'], 'delete_user' => 0], 'users');
            $this->session->set_userdata('user', $g_admin);
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function account()
    {
        if (check_role() == 1 || check_role() == 2 || check_role() == 6) {
            $page = $this->uri->segment(2);
            if ($page < 1 || $page == '') {
                $page = 1;
            }
            $limit = 10;
            $start = $limit * ($page - 1);
            $where = " delete_user = 0 ";
            if( check_role() == 6){
                $where .= " AND author_id = ".get_id();
            }
            if ($this->input->get('p') != '') {
                $p = $this->input->get('p');
                $where .= " AND phone LIKE '$p'";
            }
            if ($this->input->get('r') != '') {
                $r = $this->input->get('r');
                $where .= " AND role = $r";
            }
            if ($this->input->get('type') != '') {
                $type = $this->input->get('type');
                $where .= " AND status = $type";
            }
            if ($this->input->get('acc') != '') {
                $acc = $this->input->get('acc');
                $where .= " AND id = $acc";
            }
            if ($this->input->get('cs') > 0) {
                $created_start = $this->input->get('cs');
                $where .= " AND created_at >= $created_start";
            }
            if ($this->input->get('ce') > 0) {
                $created_end = $this->input->get('ce');
                $where .= " AND created_at <= $created_end";
            }
            $list_user = $this->Madmin->query_sql("SELECT * FROM users WHERE $where");
            pagination('/tai-khoan/', count($list_user), $limit);
            $list_user_limit = $this->Madmin->query_sql("SELECT * FROM users WHERE $where ORDER BY id DESC LIMIT $start,$limit ");
            $data['list'] = $list_user_limit;
            $data['phone'] = $this->Madmin->query_sql("SELECT DISTINCT phone FROM users WHERE delete_user = 0");
            $data['author'] = $this->Madmin->query_sql("SELECT id,name,role  FROM users WHERE role = 1 OR role = 2");
            $data['au'] = $this->Madmin->query_sql("SELECT id,name,role,username  FROM users WHERE delete_user = 0");
            $data['list_brand'] = $this->Madmin->query_sql("SELECT id,brand  FROM brands WHERE delete_status = 0");
            $data['canonical'] = base_url('laoi-du-an/');
            $data['meta_title'] = 'Quản lý tài khoản';
            $data['content'] = 'account/account';
            $data['list_js'] = [
                'sweetalert.min.js',
                'jquery.validate.min.js',
                'account/account.js',
            ];
            $data['list_css'] = [
                'sweetalert.css',
                'account/account.css',
            ];
            return $this->load->view('index', $data);
        } else {
            set_status_header(404);
            return $this->load->view('errors/html/error_role');
        }
    }
    public function add_user()
    {
        if (check_role() == 1 || check_role() == 2 || check_role() == 6) {
            $data['username'] = $username =  $this->input->post('username');
            $data['name'] = $this->input->post('name');
            $data['password'] = md5($this->input->post('password'));
            $data['phone'] = $this->input->post('phone');
            $data['email'] = $this->input->post('email');
            $data['role'] = $this->input->post('role');
            if (check_role() == 6) {
                $data['role'] = 7;
                $data['author_id'] = get_id();
            }
            $data['status'] = $this->input->post('status');
            $data['created_at'] = time();
            $data['updated_at'] = time();
            $data['list_brand'] = '';
            if ($this->input->post('role') == 6 && $this->input->post('list_brand') != '') {
                $data['list_brand'] =  implode(',', $this->input->post('list_brand'));
            }
            $check = $this->Madmin->get_by(['username' => $username, 'delete_user' => 0], 'users');
            if ($check == null) {
                $insert = $this->Madmin->insert($data, 'users');
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Tên đăng nhập đã tồn tại'
                ];
            }
        } else {
            $response = [
                'status' => 0,
                'msg' => 'Không có quyền thao tác'
            ];
        }
        echo json_encode($response);
    }
    public function edit_user()
    {
        if (check_role() == 1 || check_role() == 2 || check_role() == 6) {
            $id = $this->input->post('id');
            $check_id = $this->Madmin->get_by(['id' => $id, 'delete_user' => 0], 'users');
            if ($check_id == null || $check_id['role'] <= $_SESSION['user']['role']) {
                $response = [
                    'status' => 0,
                    'msg' => 'Bạn không có quyền thao tác'
                ];
            } else {
                $data['username'] = $username =  $this->input->post('username');
                $data['name'] = $this->input->post('name');
                $pass = $this->input->post('password');
                $data['phone'] = $this->input->post('phone');
                $data['email'] = $this->input->post('email');
                $data['role'] = $this->input->post('role');
                if (check_role() == 6) {
                    $data['role'] = 7;
                    $data['author_id'] = get_id();
                }
                if ($this->input->post('role') == 6 && $this->input->post('list_brand') != '') {
                    $data['list_brand'] =  implode(',', $this->input->post('list_brand'));
                }
                $data['status'] = $this->input->post('status');
                $data['updated_at'] = time();
                if ($pass != null && $pass != '') {
                    $data['password'] = md5($pass);
                }
                $check = $this->Madmin->get_by(['username' => $username, 'id !=' => $id, 'delete_user' => 0], 'users');
                if ($check == null) {
                    $update = $this->Madmin->update(['id' => $id], $data, 'users');
                    $response = [
                        'status' => 1,
                        'msg' => 'Thành công'
                    ];
                } else {
                    $response = [
                        'status' => 0,
                        'msg' => 'Tên đăng nhập đã tồn tại'
                    ];
                }
            }
        } else {
            $response = [
                'status' => 0,
                'msg' => 'Không có quyền thao tác'
            ];
        }
        echo json_encode($response);
    }
    public function get_user()
    {
        if (check_role() == 1 || check_role() == 2 || check_role() == 6) {
            $id = $this->input->post('id');
            $where = [
                'id' => $id,
                'delete_user' => 0
            ];
            if (check_role() == 6) {
                $where['author_id'] = get_id();
            }
            $user = $this->Madmin->get_by($where, 'users');
            if ($user != null) {
                $response = [
                    'status' => 1,
                    'user' => $user
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Tài khoản không tồn tại'
                ];
            }
        } else {
            $response = [
                'status' => 0,
                'msg' => 'Không có quyền thao tác'
            ];
        }
        echo json_encode($response);
    }
    public function delete_user()
    {
        if (check_role() == 1 || check_role() == 2 || check_role() == 6) {
            $arr_id = explode(',', $this->input->post('arr_id'));
            if ($arr_id != null) {
                foreach ($arr_id as $id) {
                    $where = " id = $id ";
                    if (check_role() == 6) {
                        $where.= " AND author_id = " . get_id();
                    }
                    $user = $this->Madmin->query_sql_row("SELECT id,role  FROM users WHERE $where");
                    if ($user != null) {
                        if ($user['role'] >= check_role()) {
                            $update = $this->Madmin->update(['id' => $id], ['delete_user' => 1], 'users');
                            $response = [
                                'status' => 1,
                                'msg' => 'Thành công'
                            ];
                        } else {
                            $response = [
                                'status' => 0,
                                'msg' => 'Không có quyền xóa'
                            ];
                        }
                    } else {
                        $response = [
                            'status' => 0,
                            'msg' => 'Người dùng không tồn tại'
                        ];
                    }
                }
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Chưa chọn người dùng'
                ];
            }
        } else {
            $response = [
                'status' => 0,
                'msg' => 'Không có quyền thao tác'
            ];
        }
        echo json_encode($response);
    }
    public function change_user()
    {
        if (check_role() == 1 || check_role() == 2) {
            $id =  $this->input->post('id');
            $name =  $this->input->post('name');
            $data[$name] = $this->input->post('value');
            $check = $this->Madmin->get_by(['id' => $id], 'users');
            if ($check != null) {
                $insert = $this->Madmin->update(['id' => $id], $data, 'users');
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Người dùng không tồn tại. Vui lòng kiểm tra lại'
                ];
            }
        } else {
            $response = [
                'status' => 0,
                'msg' => 'Không có quyền thao tác'
            ];
        }
        echo json_encode($response);
    }
}
