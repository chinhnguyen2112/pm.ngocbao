<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Setting extends CI_Controller
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
    public function project_type()
    {
        if (check_role() == 1 || check_role() == 2) {
            $page = $this->uri->segment(2);
            if ($page < 1 || $page == '') {
                $page = 1;
            }
            $limit = 10;
            $start = $limit * ($page - 1);
            $where = "AND project_type.id > 0 ";
            if ($this->input->get('n') != '') {
                $n = $this->input->get('n');
                $where .= " AND project_type.name LIKE '$n'";
            }
            if ($this->input->get('au') != '') {
                $au = $this->input->get('au');
                $where .= " AND project_type.author = $au";
            }
            if ($this->input->get('type') != '') {
                $type = $this->input->get('type');
                $where .= " AND project_type.status = $type";
            }
            if ($this->input->get('cs') > 0) {
                $created_start = $this->input->get('cs');
                $where .= " AND project_type.created_at >= $created_start";
            }
            if ($this->input->get('ce') > 0) {
                $created_end = $this->input->get('ce');
                $where .= " AND project_type.created_at <= $created_end";
            }
            if ($this->input->get('br') > 0) {
                $br = $this->input->get('br');
                $where .= " AND FIND_IN_SET($br, project_type.list_brand) ";
            }
            $project_types =  $this->Madmin->query_sql("SELECT project_type.*,users.name as name_author  FROM project_type JOIN users ON users.id=project_type.author WHERE delete_status = 0 $where");
            pagination('/loai-du-an/', count($project_types), $limit);
            $project_types_limit =  $this->Madmin->query_sql("SELECT project_type.*,users.name as name_author  FROM project_type JOIN users ON users.id=project_type.author WHERE delete_status = 0 $where  ORDER BY project_type.id DESC  LIMIT $start,$limit");
            $data['list'] = $project_types_limit;
            $data['name'] = $this->Madmin->query_sql("SELECT DISTINCT name FROM project_type WHERE delete_status = 0  ORDER BY name ASC");
            $data['author'] = $this->Madmin->query_sql("SELECT users.id,users.name,users.role  FROM project_type JOIN users ON users.id=project_type.author WHERE project_type.delete_status = 0 GROUP BY project_type.author ORDER BY name ASC ");
            $data['list_brand'] = $this->Madmin->get_list(" delete_status = 0", 'brands');
            $data['canonical'] = base_url('laoi-du-an/');
            $data['meta_title'] = 'Loại dự án';
            $data['content'] = 'setting/project_type';
            $data['list_js'] = [
                'sweetalert.min.js',
                'jquery.validate.min.js',
                'setting/project_type.js',
            ];
            $data['list_css'] = [
                'sweetalert.css',
                'setting/project_type.css',
            ];
            return $this->load->view('index', $data);
        } else {
            set_status_header(404);
            return $this->load->view('errors/html/error_role');
        }
    }
    public function view_add_project_type()
    {

        $data['job_type'] = $this->Madmin->query_sql("SELECT id,name,price,status_index,info  FROM job_type WHERE status = 1 AND delete_status = 0");
        $data['job_index'] = $this->Madmin->query_sql("SELECT id,name  FROM job_index WHERE status = 1 AND delete_status = 0");
        $data['list_brand'] = $this->Madmin->get_list(" delete_status = 0 AND status = 1 ", 'brands');
        $data['meta_title'] = 'Thêm mới loại dự án';
        $data['content'] = 'setting/add_project_type';
        $data['list_js'] = [
            'sweetalert.min.js',
            'jquery.validate.min.js',
            'setting/project_type.js',
        ];
        $data['list_css'] = [
            'sweetalert.css',
            'manager/add_project.css',
        ];
        if ($this->input->get('id') > 0) {
            $data['id'] = $id = $this->input->get('id');
            $project_type = $this->Madmin->get_by(['id' => $id], 'project_type');
            if ($project_type != null) {
                $data['project_type'] = $project_type;
            } else {
                redirect('/them-moi-loai-du-an');
            }
        }
        return $this->load->view('index', $data);
    }
    public function add_project_type()
    {
        if (check_role() == 1 || check_role() == 2) {
            $id = $this->input->post('id');
            $data['name'] = $name =  $this->input->post('name');
            $data['price'] =  $this->input->post('price');
            $data['status'] = $this->input->post('status');
            $data['file_ex'] = $this->input->post('file_ex');
            if ($this->input->post('list_brand') != '') {
                $data['list_brand'] =  implode(',', $this->input->post('list_brand'));
            }
            $data['status_index'] = $status_index = $this->input->post('status_index');
            $data_index =  $this->input->post('data_index');
            $data['data_index'] = '';
            if ($status_index == 1) {
                $data['data_index'] = json_encode($data_index);
            }
            $data_discount =  $this->input->post('data_discount');
            $data['data_discount'] = '';
            if ($data_discount != "NULL") {
                $data['data_discount'] = json_encode($data_discount);
            }
            $data_job_type =  $this->input->post('data_job_type');
            $data['job_type'] = '';
            if ($data_job_type != "NULL") {
                $data['job_type'] = json_encode($data_job_type);
            }
            $data['updated_at'] = time();
            $where = [
                'name' => $name,
                'delete_status' => 0
            ];
            if ($id > 0) {
                $where['id !='] = $id;
            }
            $check = $this->Madmin->get_by($where, 'project_type');
            if ($check == null) {
                if ($id > 0) {
                    $insert = $this->Madmin->update(['id' => $id], $data, 'project_type');
                } else {
                    $data['author'] = $_SESSION['user']['id'];
                    $data['created_at'] = time();
                    $insert = $this->Madmin->insert($data, 'project_type');
                }
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Tên loại dự án đã tồn tại'
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
    public function change_project_type()
    {
        if (check_role() == 1 || check_role() == 2) {
            $id =  $this->input->post('id');
            $name =  $this->input->post('name');
            $data[$name] = $this->input->post('value');
            $check = $this->Madmin->get_by(['id' => $id, 'delete_status' => 0], 'project_type');
            if ($check != null) {
                $insert = $this->Madmin->update(['id' => $id], $data, 'project_type');
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Loại dự án không tồn tại. Vui lòng kiểm tra lại'
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
    // / loại công việc 
    public function job_type()
    {
        if (check_role() == 1 || check_role() == 2) {
            $page = $this->uri->segment(2);
            if ($page < 1 || $page == '') {
                $page = 1;
            }
            $limit = 10;
            $start = $limit * ($page - 1);
            $where = "AND job_type.id > 0 ";
            if ($this->input->get('n') != '') {
                $n = $this->input->get('n');
                $where .= " AND job_type.name LIKE '$n'";
            }
            if ($this->input->get('au') != '') {
                $au = $this->input->get('au');
                $where .= " AND job_type.author = $au";
            }
            if ($this->input->get('type') != '') {
                $type = $this->input->get('type');
                $where .= " AND job_type.status = $type";
            }
            if ($this->input->get('cs') > 0) {
                $created_start = $this->input->get('cs');
                $where .= " AND job_type.created_at >= $created_start";
            }
            if ($this->input->get('ce') > 0) {
                $created_end = $this->input->get('ce');
                $where .= " AND job_type.created_at <= $created_end";
            }
            $job_types = $this->Madmin->query_sql("SELECT job_type.*,users.name as name_author  FROM job_type JOIN users ON users.id=job_type.author WHERE delete_status = 0 $where");
            pagination('/loai-cong-viec/', count($job_types), $limit);
            $job_types_limit = $this->Madmin->query_sql("SELECT job_type.*,users.name as name_author  FROM job_type JOIN users ON users.id=job_type.author WHERE delete_status = 0 $where ORDER BY job_type.id DESC LIMIT $start,$limit");
            $data['list'] = $job_types_limit;
            $data['name'] = $this->Madmin->query_sql("SELECT DISTINCT name FROM job_type WHERE delete_status = 0  ORDER BY name ASC");
            $data['author'] = $this->Madmin->query_sql("SELECT users.id,users.name,users.role  FROM job_type JOIN users ON users.id=job_type.author WHERE job_type.delete_status = 0 GROUP BY job_type.author ORDER BY name ASC ");
            $data['canonical'] = base_url('laoi-du-an/');
            $data['meta_title'] = 'Loại công việc';
            $data['content'] = 'setting/job_type';
            $data['list_js'] = [
                'sweetalert.min.js',
                'jquery.validate.min.js',
                'setting/job_type.js',
            ];
            $data['list_css'] = [
                'sweetalert.css',
                'setting/job_type.css',
            ];
            return $this->load->view('index', $data);
        } else {
            set_status_header(404);
            return $this->load->view('errors/html/error_role');
        }
    }
    public function add_job_type()
    {
        if (check_role() == 1 || check_role() == 2) {
            $id = $this->input->post('id');
            $data['name'] = $name =  $this->input->post('name');
            $data['status'] = $this->input->post('status');
            // $data['price'] = $this->input->post('price');
            $data['info'] = $this->input->post('info');
            $data['status_index'] = $this->input->post('status_index');
            $data['updated_at'] = time();
            $where = [
                'name' => $name,
                'delete_status' => 0
            ];
            if ($id > 0) {
                $where['id !='] = $id;
            }
            $check = $this->Madmin->get_by($where, 'job_type');
            if ($check == null) {
                if ($id > 0) {
                    $insert = $this->Madmin->update(['id' => $id], $data, 'job_type');
                } else {
                    $data['author'] = $_SESSION['user']['id'];
                    $data['created_at'] = time();
                    $insert = $this->Madmin->insert($data, 'job_type');
                }
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Tên đầu việc đã tồn tại'
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
    public function change_job_type()
    {
        if (check_role() == 1 || check_role() == 2) {
            $id =  $this->input->post('id');
            $name =  $this->input->post('name');
            $data[$name] = $this->input->post('value');
            $check = $this->Madmin->get_by(['id' => $id, 'delete_status' => 0], 'job_type');
            if ($check != null) {
                $insert = $this->Madmin->update(['id' => $id], $data, 'job_type');
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Loại công việc không tồn tại. Vui lòng kiểm tra lại'
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
    // / đầu việc cần index 
    public function job_index()
    {
        if (check_role() == 1 || check_role() == 2) {
            $page = $this->uri->segment(2);
            if ($page < 1 || $page == '') {
                $page = 1;
            }
            $limit = 10;
            $start = $limit * ($page - 1);
            $where = "AND job_index.id > 0 ";
            if ($this->input->get('n') != '') {
                $n = $this->input->get('n');
                $where .= " AND job_index.name LIKE '$n'";
            }
            if ($this->input->get('au') != '') {
                $au = $this->input->get('au');
                $where .= " AND job_index.author = $au";
            }
            if ($this->input->get('type') != '') {
                $type = $this->input->get('type');
                $where .= " AND job_index.status = $type";
            }
            if ($this->input->get('cs') > 0) {
                $created_start = $this->input->get('cs');
                $where .= " AND job_index.created_at >= $created_start";
            }
            if ($this->input->get('ce') > 0) {
                $created_end = $this->input->get('ce');
                $where .= " AND job_index.created_at <= $created_end";
            }
            $job_indexs = $this->Madmin->query_sql("SELECT job_index.*,users.name as name_author  FROM job_index JOIN users ON users.id=job_index.author WHERE delete_status = 0 $where");
            pagination('/dau-viec-can-index/', count($job_indexs), $limit);
            $job_indexs_limit = $this->Madmin->query_sql("SELECT job_index.*,users.name as name_author  FROM job_index JOIN users ON users.id=job_index.author WHERE delete_status = 0 $where LIMIT $start,$limit");
            $data['list'] = $job_indexs_limit;
            $data['name'] = $this->Madmin->query_sql("SELECT DISTINCT name FROM job_index WHERE delete_status = 0 ORDER BY name ASC");
            $data['author'] = $this->Madmin->query_sql("SELECT id,name,role  FROM users WHERE role = 1 OR role = 2 ORDER BY name ASC");
            $data['author'] = $this->Madmin->query_sql("SELECT  users.id,users.name FROM job_index JOIN users ON users.id = job_index.author WHERE delete_status = 0 GROUP BY job_index.author  ORDER BY users.name ASC");
            $data['canonical'] = base_url('loai-du-an/');
            $data['meta_title'] = 'Đầu việc cần index';
            $data['content'] = 'setting/job_index';
            $data['list_js'] = [
                'sweetalert.min.js',
                'jquery.validate.min.js',
                'setting/job_index.js',
            ];
            $data['list_css'] = [
                'sweetalert.css',
                'setting/job_index.css',
            ];
            return $this->load->view('index', $data);
        } else {
            set_status_header(404);
            return $this->load->view('errors/html/error_role');
        }
    }

    public function add_job_index()
    {
        if (check_role() == 1 || check_role() == 2) {
            $id = $this->input->post('id');
            $data['name'] = $name =  $this->input->post('name');
            $data['status'] = $this->input->post('status');
            $data['updated_at'] = time();
            $where = [
                'name' => $name,
                'delete_status' => 0
            ];
            if ($id > 0) {
                $where['id !='] = $id;
            }
            $check = $this->Madmin->get_by($where, 'job_index');
            if ($check == null) {
                if ($id > 0) {
                    $insert = $this->Madmin->update(['id' => $id], $data, 'job_index');
                } else {
                    $data['author'] = $_SESSION['user']['id'];
                    $data['created_at'] = time();
                    $insert = $this->Madmin->insert($data, 'job_index');
                }
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Tên đầu việc đã tồn tại'
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
    public function change_job_index()
    {
        if (check_role() == 1 || check_role() == 2) {
            $id =  $this->input->post('id');
            $name =  $this->input->post('name');
            $data[$name] = $this->input->post('value');
            $check = $this->Madmin->get_by(['id' => $id, 'delete_status' => 0], 'job_index');
            if ($check != null) {
                $insert = $this->Madmin->update(['id' => $id], $data, 'job_index');
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Tên đầu việc không tồn tại. Vui lòng kiểm tra lại'
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
    // / thông tin nguồn nhập
    public function input_source()
    {
        if (check_role() == 1 || check_role() == 2) {
            $page = $this->uri->segment(2);
            if ($page < 1 || $page == '') {
                $page = 1;
            }
            $limit = 10;
            $start = $limit * ($page - 1);
            $where = "AND input_source.id > 0 ";
            if ($this->input->get('ni') != '') {
                $ni = $this->input->get('ni');
                $where .= " AND input_source.name LIKE '$ni'";
            }
            if ($this->input->get('au') != '') {
                $au = $this->input->get('au');
                $where .= " AND input_source.author = $au";
            }
            if ($this->input->get('nb') != '') {
                $nb = $this->input->get('nb');
                $where .= " AND input_source.bank = $nb";
            }
            if ($this->input->get('stk') != '') {
                $stk = $this->input->get('stk');
                $where .= " AND input_source.stk = $stk";
            }
            if ($this->input->get('type') != '') {
                $type = $this->input->get('type');
                $where .= " AND input_source.status = $type";
            }
            if ($this->input->get('cs') > 0) {
                $created_start = $this->input->get('cs');
                $where .= " AND input_source.created_at >= $created_start";
            }
            if ($this->input->get('ce') > 0) {
                $created_end = $this->input->get('ce');
                $where .= " AND input_source.created_at <= $created_end";
            }
            $input_sources = $this->Madmin->query_sql("SELECT input_source.*,users.name as name_author, bank.name as name_bank  FROM input_source JOIN users ON users.id=input_source.author JOIN bank ON bank.id=input_source.bank WHERE input_source.delete_status = 0 $where");
            pagination('/thong-tin-nguon-nhan/', count($input_sources), $limit);
            $input_sources_limit = $this->Madmin->query_sql("SELECT input_source.*,users.name as name_author, bank.name as name_bank  FROM input_source JOIN users ON users.id=input_source.author JOIN bank ON bank.id=input_source.bank WHERE input_source.delete_status = 0 $where LIMIT $start,$limit");
            $data['list'] = $input_sources_limit;
            $data['bank'] = $this->Madmin->query_sql("SELECT id,name FROM bank ORDER BY CASE WHEN id = 50 THEN 0 ELSE 1 END, id ASC, name ASC ");
            $data['name_input'] = $this->Madmin->query_sql("SELECT DISTINCT name FROM input_source WHERE delete_status = 0 ORDER BY name ASC");
            $data['stk'] = $this->Madmin->query_sql("SELECT DISTINCT stk FROM input_source WHERE delete_status = 0");
            $data['author'] = $this->Madmin->query_sql("SELECT users.id,users.name,users.role  FROM input_source JOIN users ON users.id=input_source.author WHERE input_source.delete_status = 0 GROUP BY input_source.author ORDER BY name ASC ");
            $data['canonical'] = base_url('laoi-du-an/');
            $data['meta_title'] = 'Thông tin nguồn nhập';
            $data['content'] = 'setting/input_source';
            $data['list_js'] = [
                'sweetalert.min.js',
                'jquery.validate.min.js',
                'setting/input_source.js',
            ];
            $data['list_css'] = [
                'sweetalert.css',
                'setting/input_source.css',
            ];
            return $this->load->view('index', $data);
        } else {
            set_status_header(404);
            return $this->load->view('errors/html/error_role');
        }
    }

    public function add_input_source()
    {
        if (check_role() == 1 || check_role() == 2) {
            $id = $this->input->post('id');
            $data['name'] =  $this->input->post('name');
            $data['stk'] = $stk  = $this->input->post('stk');
            $data['bank'] = $this->input->post('bank');
            $data['status'] = $this->input->post('status');
            $data['updated_at'] = time();
            $where = [
                'stk' => $stk,
                'delete_status' => 0
            ];
            if ($id > 0) {
                $where['id !='] = $id;
            }
            $check = $this->Madmin->get_by($where, 'input_source');
            if ($check == null) {
                if ($id > 0) {
                    $insert = $this->Madmin->update(['id' => $id], $data, 'input_source');
                } else {
                    $data['author'] = $_SESSION['user']['id'];
                    $data['created_at'] = time();
                    $insert = $this->Madmin->insert($data, 'input_source');
                }
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Số tài khoản đã tồn tại'
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
    public function change_input_source()
    {
        if (check_role() == 1 || check_role() == 2) {
            $id =  $this->input->post('id');
            $name =  $this->input->post('name');
            $data[$name] = $this->input->post('value');
            $check = $this->Madmin->get_by(['id' => $id, 'delete_status' => 0], 'input_source');
            if ($check != null) {
                $insert = $this->Madmin->update(['id' => $id], $data, 'input_source');
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Tên đầu việc không tồn tại. Vui lòng kiểm tra lại'
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
    public function delete_type()
    {
        if (check_role() == 1 || check_role() == 2) {
            $arr_id = explode(',', $this->input->post('arr_id'));
            $table = $this->input->post('table');
            if ($arr_id != null) {
                foreach ($arr_id as $id) {
                    $type = $this->Madmin->query_sql_row("SELECT id  FROM $table WHERE id = $id");
                    if ($type != null) {
                        $update = $this->Madmin->update(['id' => $id], ['delete_status' => 1], $table);
                        $response = [
                            'status' => 1,
                            'msg' => 'Thành công'
                        ];
                    } else {
                        $response = [
                            'status' => 0,
                            'msg' => 'Không tìm thấy dữ liệu'
                        ];
                    }
                }
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Chưa chọn'
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
    public function unit_price()
    {
        if (check_role() == 1 || check_role() == 2) {
            $page = $this->uri->segment(2);
            if ($page < 1 || $page == '') {
                $page = 1;
            }
            $limit = 10;
            $start = $limit * ($page - 1);
            $where = "unit_price.id > 0 ";
            if ($this->input->get('type') > 0) {
                $type = $this->input->get('type');
                $where .= " AND unit_price.project_type = $type";
            }
            if ($this->input->get('au') > 0) {
                $au = $this->input->get('au');
                $where .= " AND unit_price.author_id = $au";
            }
            if ($this->input->get('cs') > 0) {
                $created_start = $this->input->get('cs');
                $where .= " AND unit_price.created_at >= $created_start";
            }
            if ($this->input->get('ce') > 0) {
                $created_end = $this->input->get('ce');
                $where .= " AND unit_price.created_at <= $created_end";
            }
            if ($this->input->get('cus') != '') {
                $cus = $this->input->get('cus');
                $where .= " AND unit_price.customer_id = $cus";
            }
            if ($this->input->get('st') != '') {
                $st = $this->input->get('st') - 1;
                $where .= " AND unit_price.status = $st";
            }
            $unit_price = $this->Madmin->query_sql("SELECT unit_price.*,users.name as name_author FROM unit_price JOIN users ON users.id=unit_price.author_id WHERE unit_price.delete_status = 0 AND $where  GROUP BY unit_price.customer_id");
            pagination('/don-gia/', count($unit_price), $limit);
            $unit_price_limit = $this->Madmin->query_sql("SELECT unit_price.*,users.name as name_author FROM unit_price JOIN users ON users.id=unit_price.author_id WHERE unit_price.delete_status = 0  AND $where  GROUP BY unit_price.customer_id ORDER by id DESC LIMIT $start,$limit");
            foreach ($unit_price_limit as &$val) {
                $val['list_project_type'] = $this->Madmin->query_sql("SELECT unit_price.project_type,unit_price.revenue,project_type.name FROM unit_price JOIN project_type ON project_type.id = unit_price.project_type WHERE unit_price.customer_id = {$val['customer_id']} ORDER BY name ASC");
            }
            $data['list'] = $unit_price_limit;
            $data['author'] = $this->Madmin->query_sql("SELECT id,name,role  FROM users WHERE role = 1 OR role = 2 ORDER BY name ASC");
            $data['customer'] = $this->Madmin->query_sql("SELECT id,name FROM users WHERE role = 7 ORDER BY name ASC");
            $data['project_type'] = $this->Madmin->query_sql("SELECT id,name,price FROM project_type WHERE status = 1 ORDER BY id DESC");
            //
            $data['project_type_filter'] = $this->Madmin->query_sql("SELECT DISTINCT project_type.id,project_type.name FROM project_type JOIN unit_price ON unit_price.project_type=project_type.id WHERE unit_price.delete_status = 0  ORDER BY project_type.name ASC");
            $data['customer_filter'] = $this->Madmin->query_sql("SELECT DISTINCT users.id,users.name FROM users JOIN unit_price ON unit_price.customer_id=users.id WHERE unit_price.delete_status = 0 AND users.role = 7 ORDER BY users.name ASC");
            $data['author_filter'] = $this->Madmin->query_sql("SELECT DISTINCT users.id,users.name FROM users JOIN unit_price ON unit_price.author_id=users.id WHERE unit_price.delete_status = 0 AND (users.role = 1  OR users.role = 2 ) ORDER BY users.name ASC");
            $data['canonical'] = base_url('laoi-du-an/');
            $data['meta_title'] = 'Đơn giá';
            $data['content'] = 'setting/unit_price';
            $data['list_js'] = [
                'sweetalert.min.js',
                'jquery.validate.min.js',
                'setting/unit_price.js',
            ];
            $data['list_css'] = [
                'sweetalert.css',
                'setting/job_type.css',
            ];
            return $this->load->view('index', $data);
        } else {
            set_status_header(404);
            return $this->load->view('errors/html/error_role');
        }
    }
    public function view_add_unit_price($id = 0)
    {

        $data['project_type'] = $this->Madmin->query_sql("SELECT id,name,price FROM project_type WHERE status = 1 ORDER BY id DESC");
        $data['customer'] = $this->Madmin->query_sql("SELECT users.id,users.name FROM users LEFT JOIN unit_price ON users.id = unit_price.customer_id WHERE unit_price.customer_id IS NULL AND users.role = 7 ORDER BY users.name ASC");
        $data['meta_title'] = 'Thêm Đơn Giá';
        $data['content'] = 'setting/add_unit_price';
        $data['list_js'] = [
            'sweetalert.min.js',
            'jquery.validate.min.js',
            'setting/unit_price.js',
        ];
        $data['list_css'] = [
            'sweetalert.css',
            'manager/add_project.css',
        ];
        if ($id > 0) {
            $data['customer'] = $this->Madmin->query_sql("SELECT id,name FROM users WHERE role = 7 AND id=$id ORDER BY name ASC");
            $data['id'] = $id;
            $list_revenue = $this->Madmin->query_sql("SELECT project_type,revenue FROM unit_price WHERE customer_id = $id");
            foreach ($list_revenue as &$val) {
                $val['list_select'] = $this->Madmin->query_sql_row("SELECT id,name,data_discount FROM project_type WHERE id = {$val['project_type']}");
            }
            $data['list_revenue'] = $list_revenue;
            $unit_price = $this->Madmin->query_sql_row("SELECT * FROM unit_price WHERE customer_id = $id GROUP BY customer_id");
            if ($unit_price != null) {
                $data['unit_price'] = $unit_price;
            } else {
                redirect('/them-don-gia/');
            }
        }
        return $this->load->view('index', $data);
    }
    public function add_unit_price()
    {
        if (check_role() == 1 || check_role() == 2) {
            $id = $this->input->post('id');
            $data['customer_id'] =  $this->input->post('customer_id');
            $data['status'] = $this->input->post('status');
            $data['author_id'] = $_SESSION['user']['id'];
            $data['updated_at'] = time();
            $where = [
                'customer_id' => $data['customer_id'],
                'delete_status' => 0
            ];
            if ($id > 0) {
                $where['id !='] = $id;
            }
            $check = $this->Madmin->get_list($where, 'unit_price');
            $arr_old = [];
            foreach ($check as $val) {
                $arr_old[] = $val['project_type'];
            }
            $data_revenue = $this->input->post('data_revenue');
            $arr_new = [];
            foreach ($data_revenue as $val) {
                $arr_new[] = $val['project_type'];
                $data['revenue'] = $val['number'];
                $data['project_type'] = $val['project_type'];
                if (in_array($val['project_type'], $arr_old)) {
                    $insert = $this->Madmin->update(['project_type' => $val['project_type'], 'customer_id' => $data['customer_id']], $data, 'unit_price');
                } else if (!in_array($val['project_type'], $arr_old)) {
                    $data['created_at'] = time();
                    $insert = $this->Madmin->insert($data, 'unit_price');
                }
            }
            if ($id > 0) {
                foreach ($arr_old as $value) {
                    if (!in_array($value, $arr_new)) {
                        $this->Madmin->delete(['project_type' => $value, 'customer_id' => $data['customer_id']], 'unit_price');
                    }
                }
            }
            $response = [
                'status' => 1,
                'msg' => 'Thành công'
            ];
        } else {
            $response = [
                'status' => 0,
                'msg' => 'Không có quyền thao tác'
            ];
        }
        echo json_encode($response);
    }
    public function get_unit_price()
    {
        $customer_id = $this->input->post('customer_id');
        $project_type = $this->input->post('project_type');
        if ($customer_id > 0 && $project_type > 0) {
            $data = $this->Madmin->get_by(['customer_id' => $customer_id, 'project_type' => $project_type, 'status' => 1, 'delete_status' => 0], 'unit_price');
            if ($data != null) {
                $response = [
                    'status' => 1,
                    'revenue' => $data['revenue'],
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Không tìm thấy dữ liệu'
                ];
            }
        } else {
            $response = [
                'status' => 0,
                'msg' => 'Chưa lựa chọn'
            ];
        }
        echo json_encode($response);
    }
    public function get_table()
    {
        $id = $this->input->post('id');
        $table = $this->input->post('table');
        if ($id > 0 && $table != '') {
            $data = $this->Madmin->get_by(['id' => $id], $table);
            if ($data != null) {
                $response = [
                    'status' => 1,
                    'array_data' => $data,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Không tìm thấy dữ liệu'
                ];
            }
        } else {
            $response = [
                'status' => 0,
                'msg' => 'Chưa lựa chọn'
            ];
        }
        echo json_encode($response);
    }

    // thương hiệu
    public function brands()
    {
        if (check_role() == 1 || check_role() == 2) {
            $page = $this->uri->segment(2);
            if ($page < 1 || $page == '') {
                $page = 1;
            }
            $limit = 10;
            $start = $limit * ($page - 1);
            $where = " AND brands.id > 0 ";
            if ($this->input->get('id') != '') {
                $id = $this->input->get('id');
                $where .= " AND brands.id = $id";
            }
            if ($this->input->get('au') > 0) {
                $au = $this->input->get('au');
                $where .= " AND brands.author_id = $au";
            }
            if ($this->input->get('cs') > 0) {
                $created_start = $this->input->get('cs');
                $where .= " AND brands.created_at >= $created_start";
            }
            if ($this->input->get('ce') > 0) {
                $created_end = $this->input->get('ce');
                $where .= " AND brands.created_at <= $created_end";
            }
            if ($this->input->get('st') != '') {
                $st = $this->input->get('st');
                $where .= " AND brands.status = $st";
            }
            $brands = $this->Madmin->query_sql_num("SELECT brands.*,users.name as name_author  FROM brands JOIN users ON users.id=brands.author_id WHERE delete_status = 0 $where");
            pagination('/thuong-hieu/', $brands, $limit);
            $brands_limit = $this->Madmin->query_sql("SELECT brands.*,users.name as name_author  FROM brands JOIN users ON users.id=brands.author_id WHERE delete_status = 0 $where ORDER BY brands.id DESC LIMIT $start,$limit");
            $data['list'] = $brands_limit;
            $data['brands'] = $this->Madmin->query_sql("SELECT id,brand FROM brands WHERE delete_status = 0  ORDER BY brand ASC");
            $data['author'] = $this->Madmin->query_sql("SELECT users.id,users.name,users.role  FROM brands JOIN users ON users.id=brands.author_id WHERE brands.delete_status = 0 GROUP BY brands.author_id ORDER BY name ASC ");
            $data['meta_title'] = 'Thương hiệu';
            $data['content'] = 'setting/brands';
            $data['list_js'] = [
                'sweetalert.min.js',
                'jquery.validate.min.js',
                'setting/brands.js',
            ];
            $data['list_css'] = [
                'sweetalert.css',
                'setting/job_type.css',
            ];
            return $this->load->view('index', $data);
        } else {
            set_status_header(404);
            return $this->load->view('errors/html/error_role');
        }
    }
    public function add_brand()
    {
        if (check_role() == 1 || check_role() == 2) {
            $id = $this->input->post('id');
            $data = $this->input->post();
            $data['author_id'] = $_SESSION['user']['id'];
            $data['updated_at'] = time();
            $where = [
                'brand' => $this->input->post('brand'),
                'delete_status' => 0
            ];
            if ($id > 0) {
                $where['id !='] = $id;
            }
            $check = $this->Madmin->get_by($where, 'brands');
            if ($check == null) {
                if ($id > 0) {
                    $insert = $this->Madmin->update(['id' => $id], $data, 'brands');
                } else {
                    $data['created_at'] = time();
                    $insert = $this->Madmin->insert($data, 'brands');
                }
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Thương hiệu đã tồn tại'
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
