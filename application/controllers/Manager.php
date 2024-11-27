<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manager extends CI_Controller
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
        }
    }
    public function index()
    {
        if (admin()) {
            $data = [];
            $data['content'] = 'main';
            return $this->load->view('index', $data);
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
    public function login()
    {
        if (!admin()) {
            return $this->load->view('login');
        } else {
            redirect('/');
        }
    }
    public function ajax_login()
    {
        $user = $this->input->post('username');
        $pass = md5($this->input->post('password'));
        $check_admin = $this->Madmin->get_by(['username' => $user, 'password' => $pass, 'delete_user' => 0], 'users');
        if ($check_admin != null) {
            $this->session->set_userdata('user', $check_admin);
            $response = [
                'status' => 1,
                'msg' => 'Đăng nhập thành công'
            ];
        } else {
            $response = [
                'status' => 0,
                'msg' => 'Sai thông tin đăng nhập, tên người dùng hoặc mật khẩu không hợp lệ'
            ];
        }
        echo json_encode($response);
    }
    public function manager_project()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2 || check_role() == 6) {
                $page = $this->uri->segment(2);
                if ($page < 1 || $page == '') {
                    $page = 1;
                }
                $limit = 10;
                $start = $limit * ($page - 1);
                $id_u = get_id();
                $where = "projects.id > 0 ";
                if (check_role() == 6) {
                    $where .= " AND projects.author = $id_u";
                }
                if ($this->input->get('id') > 0) {
                    $id_projetc = $this->input->get('id');
                    $where .= " AND projects.id = $id_projetc";
                }
                if ($this->input->get('pic') > 0) {
                    $pic = $this->input->get('pic');
                    $where .= " AND projects.author = $pic";
                }
                if ($this->input->get('type') > 0) {
                    $type = $this->input->get('type');
                    $where .= " AND projects.project_type = $type";
                }
                if ($this->input->get('cs') > 0) {
                    $created_start = $this->input->get('cs');
                    $where .= " AND projects.created_at >= $created_start";
                }
                if ($this->input->get('ce') > 0) {
                    $created_end = $this->input->get('ce');
                    $where .= " AND projects.created_at <= $created_end";
                }
                if ($this->input->get('cus') != '') {
                    $cus = $this->input->get('cus');
                    $where .= " AND projects.customer_id = $cus";
                }
                if ($this->input->get('web') != '') {
                    $web = $this->input->get('web');
                    $where .= " AND projects.website LIKE '$web'";
                }
                if ($this->input->get('st') > 0) {
                    $st = $this->input->get('st') - 1;
                    $where .= " AND projects.status = $st";
                }
                if ($this->input->get('hs') > 0) {
                    $hs = $this->input->get('hs') - 1;
                    $where .= " AND projects.handover_status = $hs";
                }
                if ($this->input->get('debt') > 0) {
                    $debt = $this->input->get('debt') - 1;
                    $where .= " AND projects.debt_status = $debt";
                }
                if ($this->input->get('tss') > 0) {
                    $tss = $this->input->get('tss');
                    $where .= " AND projects.time_start >= $tss";
                }
                if ($this->input->get('tse') > 0) {
                    $tse = $this->input->get('tse');
                    $where .= " AND projects.time_start <= $tse";
                }
                if ($this->input->get('tes') > 0) {
                    $tes = $this->input->get('tes');
                    $where .= " AND projects.time_end >= $tes";
                }
                if ($this->input->get('tee') > 0) {
                    $tee = $this->input->get('tee');
                    $where .= " AND projects.time_end <= $tee";
                }
                if ($this->input->get('tcs') > 0) {
                    $tcs = $this->input->get('tcs');
                    $where .= " AND projects.time_cancel >= $tcs";
                }
                if ($this->input->get('tce') > 0) {
                    $tce = $this->input->get('tce');
                    $where .= " AND projects.time_cancel <= $tce";
                }
                if ($this->input->get('tps') > 0) {
                    $tps = $this->input->get('tps');
                    $where .= " AND projects.time_pause >= $tps";
                }
                if ($this->input->get('tpe') > 0) {
                    $tpe = $this->input->get('tpe');
                    $where .= " AND projects.time_pause <= $tpe";
                }
                if ($this->input->get('in') > 0) {
                    $in = $this->input->get('in');
                    $where .= " AND projects.user_check_index = $in";
                }
                if ($this->input->get('tis') > 0) {
                    $tis = $this->input->get('tis');
                    $where .= " AND check_index = 1 AND projects.time_index >= $tis";
                }
                if ($this->input->get('tie') > 0) {
                    $tie = $this->input->get('tie');
                    $where .= " AND check_index = 1 AND projects.time_index <= $tie";
                }
                if ($this->input->get('sin') > 0) {
                    $sin = $this->input->get('sin');
                    if ($sin == 5) {
                        $sin = 0;
                    }
                    if ($sin <= 5) {
                        $where .= " AND projects.check_index = $sin";
                    } else {
                        if ($sin == 6) {
                            $sin = 1;
                        } elseif ($sin == 7) {
                            $sin = 0;
                        }
                        $where .= " AND projects.status_index = $sin";
                    }
                }
                if ($this->input->get('qas') > 0) {
                    $qas = $this->input->get('qas');
                    $where .= " AND ctv_jobs.time_qa_check >= $qas";
                }
                if ($this->input->get('qae') > 0) {
                    $qae = $this->input->get('qae');
                    $where .= " AND ctv_jobs.time_qa_check <= $qae";
                }
                if ($this->input->get('br') > 0) {
                    $br = $this->input->get('br');
                    $where .= " AND FIND_IN_SET($br, projects.list_brand) ";
                }
                $having = '';
                if ($this->input->get('cts') > 0) {
                    $cts = $this->input->get('cts');
                    $having .= " AND ctv_job_completion_time >= $cts";
                }
                if ($this->input->get('cte') > 0) {
                    $cte = $this->input->get('cte');
                    $having .= " AND ctv_job_completion_time <= $cte";
                }
                if ($this->input->get('ctv') > 0) {
                    $ctv = $this->input->get('ctv');
                    $having .= " AND FIND_IN_SET($ctv, ctv_work) ";
                }
                if ($this->input->get('qa') > 0) {
                    $qa = $this->input->get('qa');
                    $having .= " AND FIND_IN_SET('$qa', qa_check) > 0 ";
                }
                if ($this->input->get('pd') > 0) {
                    $pd = $this->input->get('pd');
                    if ($pd == 1) {
                        $having .= " AND ( ctv_job_count = 0 OR  job_count = 0 )";
                    } elseif ($pd == 2) {
                        $having .= " AND ctv_job_count != 0 AND  job_count != 0 ";
                    }
                }
                if ($this->input->get('sctv') > 0) {
                    $sctv = $this->input->get('sctv');
                    if ($sctv == 1) {
                        $having .= " AND job_count = 0";
                    } elseif ($sctv == 2) {
                        $having .= " AND num_ctv_job_success = job_count ";
                    } elseif ($sctv == 3) {
                        $having .= " AND job_count != 0 AND num_ctv_job_success != job_count ";
                    }
                }
                if ($this->input->get('sqa') > 0) {
                    $sqa = $this->input->get('sqa');
                    if ($sqa == 2) {
                        $having .= " AND ( job_ctv_num = 0 OR( job_qa >=0 AND  job_qa_success < job_qa ))";
                    } elseif ($sqa == 1) {
                        $having .= " AND job_qa is NULL AND job_ctv_num > 0 ";
                    } elseif ($sqa == 3) {
                        $having .= " AND( job_qa_success > job_qa OR job_qa_success = job_qa )";
                    }
                }
                $project = $this->Madmin->query_sql("SELECT 
                    projects.*,
                    users.name AS name_author,
                    users.role AS role_author,
                    project_type.name AS name_project_type,
                    COUNT(DISTINCT jobs.id) AS job_count,
                    SUM(CASE WHEN jobs.status != 3 THEN jobs.price ELSE 0 END) AS job_price,
                    COUNT(DISTINCT CASE WHEN jobs.status = 1 THEN jobs.id END) AS job_completion_count,
                    COUNT(DISTINCT ctv_jobs.id) AS ctv_job_count,
                    MIN(CASE WHEN ctv_jobs.status != 3 THEN ctv_jobs.completion_time END) AS ctv_job_completion_time,
                    GROUP_CONCAT(DISTINCT ctv_jobs.ctv) AS ctv_work, 
                    GROUP_CONCAT(DISTINCT CASE WHEN ctv_jobs.qa_id > 0 THEN ctv_jobs.qa_id END) AS qa_check,
                    IFNULL(num_ctv_jobs.num_ctv_job_success, 0) AS num_ctv_job_success,
                    IFNULL(job_ctv.job_ctv_num, 0) AS job_ctv_num,
                    COALESCE(job_qa_count.job_qa, NULL) AS job_qa,
                    IFNULL(job_qa_success_count.job_qa_success, 0) AS job_qa_success
                    FROM 
                        projects 
                    JOIN 
                        users ON users.id = projects.author 
                    JOIN 
                        project_type ON project_type.id = projects.project_type
                    LEFT JOIN 
                        jobs ON jobs.project_id = projects.id AND jobs.delete_status = 0
                    LEFT JOIN 
                        ctv_jobs ON ctv_jobs.project_id = projects.id
                    LEFT JOIN 
                        (SELECT project_id, COUNT(*) AS num_ctv_job_success 
                        FROM ctv_jobs 
                        WHERE status = 1 
                        GROUP BY project_id) AS num_ctv_jobs 
                        ON num_ctv_jobs.project_id = projects.id
                    LEFT JOIN 
                        (SELECT project_id, COUNT(*) AS job_ctv_num
                        FROM ctv_jobs 
                        GROUP BY project_id) AS job_ctv 
                        ON job_ctv.project_id = projects.id
                    LEFT JOIN 
                        (SELECT project_id, COUNT(*) AS job_qa
                        FROM jobs
                        WHERE status_qa = 1 AND delete_status = 0
                        GROUP BY project_id) AS job_qa_count
                        ON job_qa_count.project_id = projects.id
                    LEFT JOIN 
                        (SELECT project_id, COUNT(*) AS job_qa_success
                        FROM ctv_jobs
                        WHERE status_qa_check = 1
                        GROUP BY project_id) AS job_qa_success_count
                        ON job_qa_success_count.project_id = projects.id
                    WHERE 
                        projects.delete_status = 0 AND $where
                    GROUP BY 
                        projects.id, users.name, users.role, project_type.name
                    HAVING 
                        1=1 $having
                    ORDER BY 
                    projects.id DESC ;
                ");
                pagination('/quan-ly-du-an/', count($project), $limit);
                $project_limit = $this->Madmin->query_sql("SELECT 
                    projects.*,
                    users.name AS name_author,
                    users.role AS role_author,
                    project_type.name AS name_project_type,
                    ctv_jobs.id as ctv_job_id,ctv_jobs.time_qa_check as ctv_job_time_qa_check,
                    COUNT(DISTINCT jobs.id) AS job_count,
                    SUM(CASE WHEN jobs.status != 3 THEN jobs.price ELSE 0 END) AS job_price,
                    COUNT(DISTINCT CASE WHEN jobs.status = 1 THEN jobs.id END) AS job_completion_count,
                    COUNT(DISTINCT ctv_jobs.id) AS ctv_job_count,
                    MIN(CASE WHEN ctv_jobs.status != 3 THEN ctv_jobs.completion_time END) AS ctv_job_completion_time,
                    GROUP_CONCAT(DISTINCT ctv_jobs.ctv) AS ctv_work,
                    GROUP_CONCAT(DISTINCT CASE WHEN ctv_jobs.qa_id > 0 THEN ctv_jobs.qa_id END) AS qa_check,
                    IFNULL(num_ctv_jobs.num_ctv_job_success, 0) AS num_ctv_job_success,
                    IFNULL(job_ctv.job_ctv_num, 0) AS job_ctv_num,
                    COALESCE(job_qa_count.job_qa, NULL) AS job_qa,
                    IFNULL(job_qa_success_count.job_qa_success, 0) AS job_qa_success
                    FROM 
                        projects 
                    JOIN 
                        users ON users.id = projects.author 
                    JOIN 
                        project_type ON project_type.id = projects.project_type
                    LEFT JOIN 
                        jobs ON jobs.project_id = projects.id AND jobs.delete_status = 0
                    LEFT JOIN 
                        ctv_jobs ON ctv_jobs.project_id = projects.id
                    LEFT JOIN 
                        (SELECT project_id, COUNT(*) AS num_ctv_job_success 
                        FROM ctv_jobs 
                        WHERE status = 1 
                        GROUP BY project_id) AS num_ctv_jobs 
                        ON num_ctv_jobs.project_id = projects.id
                    LEFT JOIN 
                        (SELECT project_id, COUNT(*) AS job_ctv_num
                        FROM ctv_jobs 
                        GROUP BY project_id) AS job_ctv 
                        ON job_ctv.project_id = projects.id
                    LEFT JOIN 
                        (SELECT project_id, COUNT(*) AS job_qa
                        FROM jobs
                        WHERE status_qa = 1 AND delete_status = 0
                        GROUP BY project_id) AS job_qa_count
                        ON job_qa_count.project_id = projects.id
                    LEFT JOIN 
                        (SELECT project_id, COUNT(*) AS job_qa_success
                        FROM ctv_jobs
                        WHERE status_qa_check = 1
                        GROUP BY project_id) AS job_qa_success_count
                        ON job_qa_success_count.project_id = projects.id
                    WHERE 
                        projects.delete_status = 0 AND $where
                    GROUP BY 
                        projects.id, users.name, users.role, project_type.name
                    HAVING 
                        1=1 $having
                    ORDER BY 
                        projects.id DESC 
                    LIMIT 
                        $start, $limit;
                ");
                $data['project'] = $project_limit;
                $data['project_type'] = $this->Madmin->query_sql("SELECT project_type.id,project_type.name  FROM projects JOIN project_type ON projects.project_type = project_type.id WHERE projects.delete_status = 0 GROUP BY projects.project_type ORDER BY name ASC");
                $data['filter_project'] = $this->Madmin->query_sql("SELECT id FROM projects WHERE  delete_status = 0 ");
                $data['customer'] = $this->Madmin->query_sql("SELECT DISTINCT users.id,users.name FROM users JOIN projects ON projects.customer_id = users.id WHERE projects.delete_status = 0 AND role = 7 ORDER BY users.name ASC");
                $data['website'] = $this->Madmin->query_sql("SELECT DISTINCT website FROM projects WHERE  delete_status = 0  ORDER BY website ASC");
                $data['job_index'] = $this->Madmin->query_sql("SELECT id,name  FROM job_index WHERE status = 1 AND delete_status = 0 ORDER BY name ASC");
                $data['qa_check'] = $this->Madmin->query_sql("SELECT users.id, users.name, users.role FROM users LEFT JOIN ctv_jobs ON users.id = ctv_jobs.qa_id WHERE (users.role = 4 AND users.delete_user = 0)  OR (users.delete_user = 1 AND ctv_jobs.qa_id IS NOT NULL) GROUP BY users.id, users.name, users.role ORDER BY users.name ASC;");
                $data['ctv_filter'] = $this->Madmin->query_sql("SELECT users.id, users.name, users.role FROM users LEFT JOIN ctv_jobs ON users.id = ctv_jobs.ctv WHERE (users.role = 5 AND users.delete_user = 0)  OR (users.delete_user = 1 AND ctv_jobs.ctv IS NOT NULL) GROUP BY users.id, users.name, users.role ORDER BY users.name ASC;");
                $data['index_filter'] = $this->Madmin->query_sql("SELECT users.id, users.name, users.role FROM users LEFT JOIN projects ON projects.user_check_index = users.id WHERE (users.role = 3 AND users.delete_user = 0)  OR (users.delete_user = 1 AND projects.user_check_index IS NOT NULL) GROUP BY users.id, users.name, users.role ORDER BY users.name ASC;");
                $data['ctv_qa_index'] = $this->Madmin->query_sql("SELECT id,name,role  FROM users WHERE role = 5 OR role = 4 OR role = 3  ORDER BY name ASC");
                $data['author'] = $this->Madmin->query_sql("SELECT  users.id,users.name,users.role FROM projects JOIN users ON users.id = projects.author WHERE delete_status = 0 GROUP BY projects.author  ORDER BY users.name ASC");
                $data['advanced_filter'] = $this->Madmin->get_by(" user_id = $id_u AND page_id = 1 ", 'advanced_filter');
                $data['list_brand'] = $this->Madmin->get_list(" delete_status = 0 AND status = 1 ", 'brands');
                $data['canonical'] = base_url('quan-ly-du-an/');
                $data['meta_title'] = 'Quản lý dự án';
                $data['content'] = 'manager/project';
                if (check_role() == 6) {
                    $data['filter_project'] = $this->Madmin->query_sql("SELECT id FROM projects WHERE author = $id_u AND delete_status = 0 ");
                    $data['customer'] = $this->Madmin->query_sql("SELECT DISTINCT users.id,users.name FROM users JOIN projects ON projects.customer_id = users.id WHERE projects.author = $id_u AND projects.delete_status = 0 AND role = 7 ORDER BY users.name ASC");
                    $data['website'] = $this->Madmin->query_sql("SELECT DISTINCT website FROM projects WHERE author = $id_u AND delete_status = 0  ORDER BY website ASC");
                    $data['project_type'] = $this->Madmin->query_sql("SELECT project_type.id,project_type.name  FROM projects JOIN project_type ON projects.project_type = project_type.id WHERE projects.author = $id_u AND projects.delete_status = 0 GROUP BY projects.project_type ORDER BY name ASC");
                    $data['content'] = 'marketing/project';
                }
                $data['list_js'] = [
                    'manager/project.js',
                ];
                $data['list_css'] = [
                    'manager/project.css'
                ];
                return $this->load->view('index', $data);
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function project()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2 || check_role() == 6) {
                $data['project_type'] = $this->Madmin->query_sql("SELECT id,name,price,status_index,file_ex FROM project_type WHERE status = 1 AND delete_status = 0");
                $data['job_index'] = $this->Madmin->query_sql("SELECT id,name  FROM job_index WHERE status = 1 AND delete_status = 0");
                $data['job_type'] = $this->Madmin->query_sql("SELECT id,name,price,status_index,info  FROM job_type WHERE status = 1 AND delete_status = 0");

                $where_cus = ' status = 1 AND delete_user = 0 AND role = 7 ';
                if (check_role() == 6) {
                    $where_cus = ' author_id = ' . get_id();
                    $user = $this->Madmin->get_by(['id' => get_id()], 'users');
                    $data['project_type'] = [];
                    $where = '';
                    if ($user['list_brand'] != '') {
                        foreach (explode(',', $user['list_brand']) as $key => $val) {
                            $where .= ($key == 0 ? "AND (" : '') . " FIND_IN_SET($val,list_brand)" . ($key == count(explode(',', $user['list_brand'])) - 1 ? ")" : ' OR ');
                        }
                        $data['project_type'] = $this->Madmin->query_sql("SELECT id,name,price,status_index,file_ex FROM project_type WHERE status = 1 AND delete_status = 0 $where");
                    }
                }
                $data['customer'] = $this->Madmin->query_sql("SELECT id,name FROM users WHERE $where_cus ORDER BY name ASC");
                $data['list_brand'] = $this->Madmin->get_list(" delete_status = 0 AND status = 1 ", 'brands');
                $data['canonical'] = base_url('quan-ly-du-an/');
                $data['meta_title'] = 'Thêm dự án';
                $data['content'] = 'manager/add_project';
                $data['list_js'] = [
                    'sweetalert.min.js',
                    'jquery.validate.min.js',
                    'manager/add_project.js',
                ];
                $data['list_css'] = [
                    'sweetalert.css',
                    'manager/add_project.css'
                ];
                return $this->load->view('index', $data);
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function edit_project($id)
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2 || check_role() == 6) {
                $num_job = $this->Madmin->num_rows(['project_id' => $id, 'delete_status' => 0], 'jobs');
                if ($id > 0 && check_role() == 6 && $num_job > 0) { // dự án MKT thêm không sửa được khi đã thêm công việc
                    set_status_header(404);
                    return $this->load->view('errors/html/error_role');
                } else {
                    $where_cus = ' delete_user = 0 AND role = 7 ';
                    if (check_role() == 6) {
                        $where_cus = ' author_id = ' . get_id();
                    }
                    $data['project'] = $this->Madmin->query_sql_row("SELECT * FROM projects WHERE id = $id AND delete_status = 0");
                    $data['project_type'] = $this->Madmin->query_sql("SELECT id,name,price,list_brand,status_index,file_ex FROM project_type WHERE status = 1 AND delete_status = 0");
                    $data['job_index'] = $this->Madmin->query_sql("SELECT id,name  FROM job_index WHERE status = 1 AND delete_status = 0");
                    $data['job_type'] = $this->Madmin->query_sql("SELECT id,name,price,status_index,info  FROM job_type WHERE status = 1 AND delete_status = 0");
                    $data['customer'] = $this->Madmin->query_sql("SELECT id,name FROM users WHERE $where_cus ORDER BY name ASC");
                    $data['list_brand'] = $this->Madmin->get_list(" delete_status = 0 ", 'brands');
                    $user = $this->Madmin->get_by(['id' => get_id()], 'users');
                    $data['arr_brand'] = explode(',', $user['list_brand']);
                    $data['canonical'] = base_url('quan-ly-du-an/');
                    $data['meta_title'] = 'Sửa dự án';
                    $data['content'] = 'manager/edit_project';
                    $data['list_js'] = [
                        'sweetalert.min.js',
                        'jquery.validate.min.js',
                        'manager/add_project.js',
                    ];
                    $data['list_css'] = [
                        'sweetalert.css',
                        'manager/add_project.css'
                    ];
                    return $this->load->view('index', $data);
                }
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function add_project()
    {
        if (check_role() == 1 || check_role() == 2 || check_role() == 6) {
            $id = $this->input->post('id');
            $num_job = $this->Madmin->num_rows(['project_id' => $id, 'delete_status' => 0], 'jobs');
            if ($id > 0 && check_role() == 6 && $num_job > 0) { // dự án MKT thêm không sửa được khi đã thêm công việc
                $response = [
                    'status' => 0,
                    'msg' => 'Không có quyền thao tác'
                ];
            } else {
                if ($id > 0) {
                    $data['status'] = $status = $this->input->post('status');
                    $data['debt_status'] = $this->input->post('debt_status');
                    $data['handover_status'] = $this->input->post('handover_status');
                    $time_urges = $this->input->post('time_urges');
                    $check = $this->Madmin->get_by(['id' => $id], 'projects');
                    if ($status == 2) {
                        if ($check['time_start'] == '') {
                            $data['time_start'] = time();
                        }
                    }
                    if ($time_urges > 0 && $check != null) {
                        if ($check['time_urges'] != '') {
                            $data['time_urges'] = trim(strtotime($time_urges)) . ',' . $check['time_urges'];
                        } else {
                            $data['time_urges'] = strtotime($time_urges);
                        }
                    }
                }
                $data['project_type'] = $this->input->post('project_type');
                $data['deadline'] = strtotime($this->input->post('deadline'));
                $data['revenue'] = $this->input->post('revenue');
                $data['info'] = $this->input->post('info');
                $data['website'] = $this->input->post('website');
                $data['file'] = $this->input->post('file');
                $data['note_index'] = $this->input->post('note_index');
                $data['note'] = $this->input->post('note');
                $data['status_index'] = $status_index = $this->input->post('status_index');
                $data_index =  $this->input->post('data_index');
                $data['author'] = $_SESSION['user']['id'];
                $data['time_index'] = time();
                $data['updated_at'] = time();
                $data['customer_id'] = $this->input->post('customer_id');
                $data['check_index'] = 0;
                $data['data_index'] = '';
                if (check_role() == 6) {
                    $user = $this->Madmin->get_by(['id' => $_SESSION['user']['id']], 'users');
                    $data['list_brand'] = $user['list_brand'];
                } else {
                    if ($this->input->post('list_brand') != '') {
                        $data['list_brand'] =  implode(',', $this->input->post('list_brand'));
                    }
                }
                if ($status_index == 1) {
                    $data['data_index'] = json_encode($data_index);
                    $data['check_index'] = 4;
                }
                if ($id > 0) {
                    $update = $this->Madmin->update(['id' => $id], $data, 'projects');
                } else {
                    $data['created_at'] = time();
                    $data['status'] = 0;
                    $id = $this->Madmin->insert($data, 'projects');
                    $data_job_type  = $this->input->post('data_job_type');
                    if ($data_job_type != null && check_role() != 6) {
                        foreach ($data_job_type as $val) {
                            $job_type = $this->Madmin->get_by(['id' => $val['job_type']], 'job_type');
                            $data_job['job_type'] = $val['job_type'];
                            $data_job['num_job_type'] = $val['number'];
                            // $data_job['price'] = $job_type['price'];
                            $data_job['info'] =  $job_type['info'];
                            $data_job['project_id'] = $id;
                            $data_job['code'] = $this->count_job($id);
                            if ($status_index == 1) {
                                $data_job['status_index'] = $job_type['status_index'];
                            }
                            $data_job['author'] = $_SESSION['user']['id'];
                            $data_job['updated_at'] = time();
                            $data_job['created_at'] = time();
                            $insert_job = $this->Madmin->insert($data_job, 'jobs');
                        }
                        $update = $this->Madmin->update(['id' => $id], ['status' => 2, 'time_start' => time()], 'projects');
                    }
                }
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
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
    public function manager_job()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
                $id_u = get_id();
                $page = $this->uri->segment(2);
                if ($page < 1 || $page == '') {
                    $page = 1;
                }
                $limit = 10;
                $start = $limit * ($page - 1);
                $where = "AND jobs.id > 0 ";
                if ($this->input->get('id') > 0) {
                    $id_job = $this->input->get('id');
                    $where .= " AND jobs.id = $id_job";
                }
                if ($this->input->get('web') != '') {
                    $web = $this->input->get('web');
                    $where .= " AND projects.website LIKE '$web'";
                }
                if ($this->input->get('type') > 0) {
                    $type = $this->input->get('type');
                    $where .= " AND jobs.job_type = $type";
                }
                if ($this->input->get('au') > 0) {
                    $au = $this->input->get('au');
                    $where .= " AND jobs.author = $au";
                }
                if ($this->input->get('zs') >= 0 && $this->input->get('zs') != '') {
                    $zs = $this->input->get('zs');
                    $where .= " AND jobs.z_index >= $zs";
                }
                if ($this->input->get('ze') >= 0 && $this->input->get('ze') != '') {
                    $ze = $this->input->get('ze');
                    $where .= " AND jobs.z_index <= $ze";
                }
                if ($this->input->get('sj') > 0) {
                    $sj = $this->input->get('sj');
                    if ($sj == 2) {
                        $sj = 0;
                    }
                    $where .= " AND jobs.status = $sj";
                }
                if ($this->input->get('cs') > 0) {
                    $created_start = $this->input->get('cs');
                    $where .= " AND jobs.created_at >= $created_start";
                }
                if ($this->input->get('ce') > 0) {
                    $created_end = $this->input->get('ce');
                    $where .= " AND jobs.created_at <= $created_end";
                }
                if ($this->input->get('js') > 0) {
                    $js = $this->input->get('js');
                    $where .= " AND jobs.completion_time >= $js";
                }
                if ($this->input->get('je') > 0) {
                    $je = $this->input->get('je');
                    $where .= " AND jobs.completion_time <= $je";
                }
                if ($this->input->get('dls') > 0) {
                    $dls = $this->input->get('dls');
                    $where .= " AND ctv_jobs.deadline >= $dls";
                }
                if ($this->input->get('dle') > 0) {
                    $dle = $this->input->get('dle');
                    $where .= " AND ctv_jobs.deadline <= $dle";
                }
                if ($this->input->get('tss') > 0) {
                    $tss = $this->input->get('tss');
                    $where .= " AND ctv_jobs.created_at >= $tss";
                }
                if ($this->input->get('tse') > 0) {
                    $tse = $this->input->get('tse');
                    $where .= " AND ctv_jobs.created_at <= $tse";
                }
                if ($this->input->get('tes') > 0) {
                    $tes = $this->input->get('tes');
                    $where .= " AND ctv_jobs.completion_time >= $tes";
                }
                if ($this->input->get('tee') > 0) {
                    $tee = $this->input->get('tee');
                    $where .= " AND ctv_jobs.completion_time <= $tee";
                }
                if ($this->input->get('tcs') > 0) {
                    $tcs = $this->input->get('tcs');
                    $where .= " AND ctv_jobs.time_qa_check >= $tcs";
                }
                if ($this->input->get('tce') > 0) {
                    $tce = $this->input->get('tce');
                    $where .= " AND ctv_jobs.time_qa_check <= $tce";
                }
                if ($this->input->get('sctv') > 0 || $this->input->get('sctv')  == -1) {
                    $sctv = $this->input->get('sctv');
                    if ($sctv == 1) {
                        $where .= " AND ( ctv_jobs.status = 1 OR ctv_jobs.status = 2)";
                    } elseif ($sctv == 4) {
                        $where .= " AND ctv_jobs.status = 0";
                    } elseif ($sctv == -1) {
                        $where .= " AND ctv_jobs.ctv  IS NULL";
                    } else {
                        $where .= " AND ctv_jobs.status = $sctv";
                    }
                }
                if ($this->input->get('ctv') > 0 || $this->input->get('ctv') == -1) {
                    $ctv = $this->input->get('ctv');
                    if ($ctv > 0) {
                        $where .= " AND ctv_jobs.ctv = $ctv";
                    } else {
                        $where .= " AND ( ctv_jobs.ctv IS NULL OR ctv_jobs.id IS NULL )";
                    }
                }
                if ($this->input->get('qa') > 0) {
                    $qa = $this->input->get('qa');
                    $where .= " AND ctv_jobs.qa_id = $qa";
                }
                if ($this->input->get('sqa') > 0) {
                    $sqa = $this->input->get('sqa');
                    $sqa = $sqa - 1;
                    if ($sqa == 4) {
                        $where .= " AND ( jobs.status_qa = 0 OR jobs.status_qa Is NULL)";
                    } else {
                        $where .= " AND jobs.status_qa = 1 AND ctv_jobs.status_qa_check = $sqa";
                    }
                }
                if ($this->input->get('cr') > 0) {
                    $cr = $this->input->get('cr');
                    if ($cr == 4) {
                        $cr = 0;
                    }
                    $where .= " AND ctv_jobs.check_replly = $cr";
                }
                $jobs = $this->Madmin->query_sql("SELECT 
                    jobs.*, 
                    job_type.name AS name_job_type, 
                    users.name AS name_author, 
                    users.role AS role_author, 
                    projects.website AS website, 
                    ctv_jobs.ctv, 
                    ctv_jobs.deadline AS deadline_ctv, 
                    ctv_jobs.time_qa_check, 
                    ctv_jobs.status_qa_check, 
                    ctv_jobs.content_qa_check, 
                    ctv_jobs.check_replly AS ctv_check_replly, 
                    ctv_jobs.qa_id, 
                    ctv_jobs.status AS status_ctv, 
                    ctv_jobs.completion_time AS completion_ctv_job, 
                    ctv_jobs.created_at AS time_ctv_job 
                FROM 
                    jobs 
                JOIN 
                    projects ON projects.id = jobs.project_id 
                JOIN 
                    job_type ON job_type.id = jobs.job_type 
                JOIN 
                    users ON users.id = jobs.author 
                LEFT JOIN 
                    ctv_jobs ON ctv_jobs.job_id = jobs.id 
                WHERE 
                    jobs.delete_status = 0 $where 
                ORDER BY 
                    jobs.id DESC ");
                pagination('/quan-ly-cong-viec/', count($jobs), $limit);
                $jobs_limit = $this->Madmin->query_sql("SELECT 
                    jobs.*, 
                    job_type.name AS name_job_type, 
                    users.name AS name_author, 
                    users.role AS role_author, 
                    projects.website AS website, 
                    ctv_jobs.ctv, 
                    ctv_jobs.deadline AS deadline_ctv, 
                    ctv_jobs.time_qa_check, 
                    ctv_jobs.status_qa_check, 
                    ctv_jobs.content_qa_check, 
                    ctv_jobs.check_replly AS ctv_check_replly, 
                    ctv_jobs.qa_id, 
                    ctv_jobs.status AS status_ctv, 
                    ctv_jobs.completion_time AS completion_ctv_job, 
                    ctv_jobs.created_at AS time_ctv_job 
                FROM 
                    jobs 
                JOIN 
                    projects ON projects.id = jobs.project_id 
                JOIN 
                    job_type ON job_type.id = jobs.job_type 
                JOIN 
                    users ON users.id = jobs.author 
                LEFT JOIN 
                    ctv_jobs ON ctv_jobs.job_id = jobs.id 
                WHERE 
                    jobs.delete_status = 0 $where 
                ORDER BY 
                    jobs.id DESC 
                LIMIT $start, $limit");
                $data['jobs'] = $jobs_limit;
                $data['job_type'] = $this->Madmin->query_sql("SELECT job_type.id,job_type.name,job_type.status,job_type.delete_status  FROM jobs JOIN job_type ON job_type.id = jobs.job_type WHERE jobs.delete_status = 0 GROUP BY job_type  ORDER BY job_type.name ASC");
                $data['ctv'] = $this->Madmin->query_sql("SELECT id,name  FROM users where role=5 AND status = 1 AND delete_user = 0  ORDER BY name ASC");
                $data['qa_check'] = $this->Madmin->query_sql("SELECT users.id, users.name, users.role FROM users LEFT JOIN ctv_jobs ON users.id = ctv_jobs.qa_id WHERE (users.role = 4 AND users.delete_user = 0)  OR (users.delete_user = 1 AND ctv_jobs.qa_id IS NOT NULL) GROUP BY users.id, users.name, users.role ORDER BY users.name ASC;");
                $data['list_ctv'] = $this->Madmin->query_sql("SELECT  users.id,users.name,users.role FROM ctv_jobs JOIN users ON users.id = ctv_jobs.ctv WHERE role = 5 GROUP BY ctv_jobs.ctv  ORDER BY users.name ASC");
                $data['website'] = $this->Madmin->query_sql("SELECT DISTINCT website FROM projects JOIN jobs ON jobs.project_id = projects.id WHERE jobs.delete_status = 0");
                $data['filter_job'] = $this->Madmin->query_sql("SELECT id,code FROM jobs WHERE  delete_status = 0 ORDER BY project_id ASC");
                $data['author'] = $this->Madmin->query_sql("SELECT  users.id,users.name,users.role FROM jobs JOIN users ON users.id = jobs.author WHERE delete_status = 0 GROUP BY jobs.author  ORDER BY users.name ASC");
                $data['advanced_filter'] = $this->Madmin->get_by(" user_id = $id_u AND page_id = 2 ", 'advanced_filter');
                $data['canonical'] = base_url('quan-ly-du-an/');
                $data['meta_title'] = 'Quản lý công việc';
                $data['content'] = 'manager/job';
                $data['list_js'] = [
                    'manager/job.js',
                ];
                $data['list_css'] = [
                    'manager/job.css'
                ];
                return $this->load->view('index', $data);
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function job()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
                $data['job_type'] = $this->Madmin->query_sql("SELECT id,name,price,status_index,info  FROM job_type WHERE status = 1 AND delete_status = 0");
                $data['projects'] = $this->Madmin->query_sql("SELECT id,status_index  FROM projects WHERE  delete_status = 0 ORDER BY id DESC");
                $data['ctv'] = $this->Madmin->query_sql("SELECT id,name  FROM users where role=5 AND status = 1 AND delete_user = 0");
                $data['canonical'] = base_url('quan-ly-du-an/');
                $data['meta_title'] = 'Thêm công việc';
                $data['content'] = 'manager/add_job';
                $data['list_js'] = [
                    'sweetalert.min.js',
                    'jquery.validate.min.js',
                    'manager/add_job.js',
                ];
                $data['list_css'] = [
                    'sweetalert.css',
                    'manager/add_job.css'
                ];
                return $this->load->view('index', $data);
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function edit_job($id)
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
                $data['job'] = $job = $this->Madmin->query_sql_row("SELECT * FROM jobs WHERE id = $id AND status != 3 AND delete_status = 0");
                $data['ctv_job'] = $ctv_job = $this->Madmin->query_sql_row("SELECT * FROM ctv_jobs WHERE  job_id = $id");
                $data['job_type'] = $this->Madmin->query_sql("SELECT id,name,status,delete_status,price,status_index,info  FROM job_type ");
                $data['project'] = $this->Madmin->query_sql_row("SELECT id,status_index  FROM projects WHERE id= {$job['project_id']} AND delete_status = 0");
                $list_ctv = $this->Madmin->query_sql("SELECT id,name  FROM users where role=5 AND status = 1 AND delete_user = 0");
                if ($ctv_job != null && $ctv_job['ctv'] > 0) {
                    $ctv = $this->Madmin->get_by("id = {$ctv_job['ctv']}", 'users');
                    if ($ctv != null && ($ctv['role'] != 5 || $ctv['status'] != 1 || $ctv['delete_user'] != 0)) {
                        array_push($list_ctv, $ctv);
                    }
                }
                $data['ctv'] = $list_ctv;
                $data['canonical'] = base_url('quan-ly-du-an/');
                $data['meta_title'] = 'Sửa công việc';
                $data['content'] = 'manager/edit_job';
                $data['list_js'] = [
                    'sweetalert.min.js',
                    'jquery.validate.min.js',
                    'manager/add_job.js',
                ];
                $data['list_css'] = [
                    'sweetalert.css',
                    'manager/add_job.css'
                ];
                return $this->load->view('index', $data);
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function add_job()
    {
        if (check_role() == 1 || check_role() == 2  || check_role() == 4) {
            $id = $this->input->post('id');
            $data['file_job'] = $this->input->post('file');
            $data['job_type'] = $this->input->post('job_type');
            $data['price'] = $this->input->post('price');
            $data['num_job_type'] = $this->input->post('num_job_type');
            $data['z_index'] = $this->input->post('z_index');
            $data['info'] = $this->input->post('info');
            $data['note_ctv'] = $this->input->post('note_ctv');
            $data['note_qa'] = $this->input->post('note_qa');
            $data['note'] = $this->input->post('note');
            $data['status_index'] = $this->input->post('status_index');
            $data['status_qa'] = $this->input->post('status_qa');
            $data['author'] = $_SESSION['user']['id'];
            $data['updated_at'] = time();
            $ctv = $this->input->post('ctv');
            $deadline = $this->input->post('deadline');
            if ($id > 0) {
                $data['punish'] = $this->input->post('punish');
                $check_job = $this->Madmin->get_by(['id' => $id], 'jobs');
                if ($check_job['status_index'] == 0 && $data['status_index'] == 1) {
                    $data_project['check_index'] = 4;
                    $update_project = $this->Madmin->update(['id' => $check_job['project_id']], $data_project, 'projects'); // bắt đầu triển khai
                }
                $update = $this->Madmin->update(['id' => $id], $data, 'jobs');
                $check_ctv = $this->Madmin->get_by(['job_id' => $id], 'ctv_jobs');
                $insert  = $id;
                $project_id = $check_job['project_id'];
            } else {
                $data['project_id'] = $project_id = $this->input->post('project_id');
                $data['code'] = $this->count_job($project_id);
                $data['created_at'] = time();
                $insert = $this->Madmin->insert($data, 'jobs');
                $check = $this->Madmin->get_by(['id' => $project_id], 'projects');
                $data_project['status'] = 2;
                if ($check['time_start'] == '') {
                    $data_project['time_start'] = time();
                }
                if ($check['status_index'] == 1) {
                    $data_project['check_index'] = 4;
                }
                $update_project = $this->Madmin->update(['id' => $project_id], $data_project, 'projects'); // bắt đầu triển khai
            }

            if ($ctv > 0) {
                $data_2['ctv'] = $ctv;
                $data_2['deadline'] = strtotime($deadline);
                $data_2['updated_at'] = time();
                $data_2['content_qa_check'] = null;
                if ($id > 0 && $check_ctv != null) {
                    $data_2['content_qa_check'] = $this->input->post('content_qa_check');
                    $update = $this->Madmin->update(['id' => $check_ctv['id']], $data_2, 'ctv_jobs');
                } else {
                    $data_2['project_id'] = $project_id;
                    $data_2['job_id'] = $insert;
                    $data_2['created_at'] = time();
                    $insert_2 = $this->Madmin->insert($data_2, 'ctv_jobs');
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
    public function default_job_mkt()
    {
        if (check_role() == 1 || check_role() == 2) {
            $id = $this->input->post('id');
            $project = $this->Madmin->query_sql_row("SELECT project_type.job_type,projects.status_index FROM projects join project_type ON project_type.id = projects.project_type WHERE projects.id = $id AND projects.delete_status = 0");
            $jobs = $this->Madmin->num_rows(['project_id' => $id], 'jobs');
            if ($jobs == 0) {
                if ($project['job_type'] != '') {
                    $arr_job_type = explode(',', $project['job_type']);
                    foreach ($arr_job_type as $val) {
                        $job_type = $this->Madmin->get_by(['id' => $val], 'job_type');
                        $data_job['job_type'] = $val;
                        $data_job['price'] = $job_type['price'];
                        $data_job['info'] =  $job_type['info'];
                        $data_job['project_id'] = $id;
                        $data_job['code'] = $this->count_job($id);
                        if ($project['status_index'] == 1) {
                            $data_job['status_index'] = $job_type['status_index'];
                        }
                        $data_job['author'] = $_SESSION['user']['id'];
                        $data_job['updated_at'] = time();
                        $data_job['created_at'] = time();
                        $insert_job = $this->Madmin->insert($data_job, 'jobs');
                    }
                    $update = $this->Madmin->update(['id' => $id], ['status' => 2, 'time_start' => time()], 'projects');
                    $response = [
                        'status' => 1,
                        'msg' => 'Thành công'
                    ];
                } else {
                    $response = [
                        'status' => 0,
                        'msg' => 'Không có loại công việc'
                    ];
                }
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Dự án này đã có công việc'
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
    public function view_project_mkt($id)
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
                $num_job = $this->Madmin->num_rows(['project_id' => $id, 'delete_status' => 0], 'jobs');
                if ($id > 0 && $num_job > 0) { // dự án MKT thêm không sửa được khi đã thêm công việc
                    set_status_header(404);
                    return $this->load->view('errors/html/error_role');
                } else {
                    $data['project'] = $this->Madmin->query_sql_row("SELECT * FROM projects WHERE id = $id AND delete_status = 0");
                    $data['project_type'] = $this->Madmin->query_sql("SELECT id,name,price,status_index,file_ex FROM project_type WHERE status = 1 AND delete_status = 0");
                    $data['job_index'] = $this->Madmin->query_sql("SELECT id,name  FROM job_index WHERE status = 1 AND delete_status = 0");
                    $data['job_type'] = $this->Madmin->query_sql("SELECT id,name,price,status_index,info  FROM job_type WHERE status = 1 AND delete_status = 0");
                    $data['meta_title'] = 'Thêm thông tin dự án';
                    $data['content'] = 'manager/add_job_mkt';
                    $data['list_js'] = [
                        'sweetalert.min.js',
                        'jquery.validate.min.js',
                        'manager/add_job_mkt.js',
                    ];
                    $data['list_css'] = [
                        'sweetalert.css',
                        'manager/add_project.css'
                    ];
                    return $this->load->view('index', $data);
                }
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function add_project_mkt()
    {
        if (admin() && (check_role() == 1 || check_role() == 2)) {
            $id = $this->input->post('id');
            if ($id > 0) {
                $num_job = $this->Madmin->num_rows(['project_id' => $id, 'delete_status' => 0], 'jobs');
                if ($num_job > 0) { // dự án MKT thêm không sửa được khi đã thêm công việc
                    $response = [
                        'status' => 0,
                        'msg' => 'Không có quyền thao tác'
                    ];
                } else {
                    $status_index = $this->input->post('status_index');
                    $data_index =  $this->input->post('data_index');
                    $data['time_index'] = time();
                    $data['updated_at'] = time();
                    $data['status'] = 2;
                    $data['time_start'] = time();
                    $data['check_index'] = 0;
                    $data['data_index'] = '';
                    if ($status_index == 1) {
                        $data['data_index'] = json_encode($data_index);
                        $data['check_index'] = 4;
                    }
                    $update = $this->Madmin->update(['id' => $id], $data, 'projects');
                    $data_job_type  = $this->input->post('data_job_type');
                    if ($data_job_type != '') {
                        $arr_job_type = explode(',', $data_job_type);
                        foreach ($arr_job_type as $val) {
                            $job_type = $this->Madmin->get_by(['id' => $val], 'job_type');
                            $data_job['job_type'] = $val;
                            $data_job['price'] = $job_type['price'];
                            $data_job['info'] =  $job_type['info'];
                            $data_job['project_id'] = $id;
                            $data_job['code'] = $this->count_job($id);
                            if ($status_index == 1) {
                                $data_job['status_index'] = $job_type['status_index'];
                            }
                            $data_job['author'] = $_SESSION['user']['id'];
                            $data_job['updated_at'] = time();
                            $data_job['created_at'] = time();
                            $insert_job = $this->Madmin->insert($data_job, 'jobs');
                        }
                    }
                    $response = [
                        'status' => 1,
                        'msg' => 'Thành công'
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
    function count_job($project)
    {
        $num = $this->Madmin->num_rows(['project_id' => $project], 'jobs');
        $id_project = project_id($project);
        $code = $id_project . '_CV' . ++$num;
        return $code;
    }
    function name_user($id)
    {
        $data = $this->Madmin->query_sql_row("SELECT name  FROM users where id = $id");
        return $data['name'];
    }
    public function manager_collect_money()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
                $id_u = get_id();
                $page = $this->uri->segment(2);
                if ($page < 1 || $page == '') {
                    $page = 1;
                }
                $limit = 10;
                $start = $limit * ($page - 1);
                $where = "AND projects.id > 0 ";
                if ($this->input->get('id') > 0) {
                    $id_projetc = $this->input->get('id');
                    $where .= " AND projects.id = $id_projetc";
                }
                if ($this->input->get('cus') != '') {
                    $cus = $this->input->get('cus');
                    $where .= " AND collect_money.customer LIKE '$cus'";
                }
                if ($this->input->get('type') > 0) {
                    $type = $this->input->get('type');
                    $where .= " AND collect_money.bank_type = $type";
                }
                if ($this->input->get('bs') > 0) {
                    $bs = $this->input->get('bs');
                    if ($bs == 3) {
                        $bs = 0;
                    }
                    $where .= " AND collect_money.bank_status = $bs";
                }
                if ($this->input->get('bc') != '') {
                    $bc = $this->input->get('bc');
                    if ($bc == 'khongcoma') {
                        $where .= " AND collect_money.bank_code = ''";
                    } else {
                        $where .= " AND collect_money.bank_code LIKE '$bc'";
                    }
                }
                if ($this->input->get('in') > 0) {
                    $in = $this->input->get('in');
                    $where .= " AND collect_money.input_source = $in";
                }
                if ($this->input->get('cs') > 0) {
                    $created_start = $this->input->get('cs');
                    $where .= " AND collect_money.created_at >= $created_start";
                }
                if ($this->input->get('ce') > 0) {
                    $created_end = $this->input->get('ce');
                    $where .= " AND collect_money.created_at <= $created_end";
                }
                if ($this->input->get('ts') > 0) {
                    $ts = $this->input->get('ts');
                    $where .= " AND collect_money.bank_time >= $ts";
                }
                if ($this->input->get('te') > 0) {
                    $te = $this->input->get('te');
                    $where .= " AND collect_money.bank_time <= $te";
                }
                $collect_moneys = $this->Madmin->query_sql("SELECT collect_money.*,input_source.name as name_input_source,stk,input_source.bank as id_bank FROM collect_money JOIN projects ON projects.id=collect_money.project_id JOIN input_source ON input_source.id=collect_money.input_source  WHERE collect_money.delete_status = 0 $where ORDER BY collect_money.id DESC");
                pagination('/quan-ly-thu-tien/', count($collect_moneys), $limit);
                $collect_moneys_limit = $this->Madmin->query_sql("SELECT collect_money.*,input_source.name as name_input_source,stk,input_source.bank as id_bank FROM collect_money JOIN projects ON projects.id=collect_money.project_id JOIN input_source ON input_source.id=collect_money.input_source  WHERE collect_money.delete_status = 0 $where  ORDER BY collect_money.id DESC LIMIT $start,$limit");
                $data['filter_project'] = $this->Madmin->query_sql("SELECT DISTINCT project_id as id FROM collect_money WHERE delete_status = 0 ORDER BY project_id ASC");
                $data['customer'] = $this->Madmin->query_sql("SELECT DISTINCT customer FROM collect_money WHERE delete_status = 0 ORDER BY customer ASC");
                $data['bank_code'] = $this->Madmin->query_sql("SELECT DISTINCT bank_code FROM collect_money WHERE delete_status = 0");

                $data['input_source'] = $this->Madmin->query_sql("SELECT input_source.id,acronym,input_source.name,stk  FROM collect_money JOIN input_source ON collect_money.input_source=input_source.id join bank ON bank.id=input_source.bank WHERE collect_money.delete_status = 0 GROUP BY collect_money.input_source");
                $data['advanced_filter'] = $this->Madmin->get_by(" user_id = $id_u AND page_id = 3 ", 'advanced_filter');
                $data['collect_moneys'] = $collect_moneys_limit;
                $data['canonical'] = base_url('quan-ly-du-an/');
                $data['meta_title'] = 'Quản lý thu tiền';
                $data['content'] = 'manager/collect_money';
                $data['list_js'] = [
                    'manager/collect_money.js',
                ];
                $data['list_css'] = [
                    'manager/collect_money.css'
                ];
                return $this->load->view('index', $data);
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function collect_money()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
                $data['projects'] = $this->Madmin->query_sql("SELECT id  FROM projects  WHERE delete_status = 0 ORDER BY id DESC");;
                $data['input_source'] = $this->Madmin->query_sql("SELECT input_source.id,acronym,input_source.name,stk  FROM input_source join bank ON bank.id=input_source.bank WHERE input_source.status = 1  AND delete_status = 0");
                $data['ctv'] = $this->Madmin->query_sql("SELECT id,name  FROM users where role=5 AND status = 1 AND delete_user = 0");
                $data['customer'] = $this->Madmin->query_sql("SELECT id,name FROM users WHERE role = 7 AND delete_user = 0 ORDER BY name ASC");
                $data['canonical'] = base_url('quan-ly-du-an/');
                $data['meta_title'] = 'Thêm mới thu tiền';
                $data['content'] = 'manager/add_collect_money';
                $data['list_js'] = [
                    'sweetalert.min.js',
                    'jquery.validate.min.js',
                    'manager/add_collect_money.js',
                ];
                $data['list_css'] = [
                    'sweetalert.css',
                    'manager/add_collect_money.css'
                ];
                return $this->load->view('index', $data);
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function edit_collect_money($id)
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
                $data['collect_money'] = $this->Madmin->query_sql_row("SELECT * FROM collect_money WHERE id = $id AND delete_status = 0 ");
                $data['input_source'] = $this->Madmin->query_sql("SELECT input_source.id,acronym,input_source.name,stk,input_source.status,input_source.delete_status FROM input_source join bank ON bank.id=input_source.bank");
                $data['projects'] = $this->Madmin->query_sql("SELECT id,delete_status  FROM projects ORDER BY id DESC");
                $data['customer'] = $this->Madmin->query_sql("SELECT id,name FROM users WHERE role = 7 ORDER BY name ASC");
                $data['canonical'] = base_url('quan-ly-du-an/');
                $data['meta_title'] = 'Chỉnh sửa thu tiền';
                $data['content'] = 'manager/edit_collect_money';
                $data['list_js'] = [
                    'sweetalert.min.js',
                    'jquery.validate.min.js',
                    'manager/add_collect_money.js',
                ];
                $data['list_css'] = [
                    'sweetalert.css',
                    'manager/add_collect_money.css'
                ];
                return $this->load->view('index', $data);
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function add_collect_money()
    {
        if (check_role() == 1 || check_role() == 2) {
            $id = $this->input->post('id');
            $data['money'] = $this->input->post('money');
            $data['customer'] = trim($this->input->post('customer'));
            $data['bank_type'] = $this->input->post('bank_type');
            $data['bank_status'] = $this->input->post('bank_status');
            $data['note'] = $this->input->post('note');
            $data['bank_content'] = $this->input->post('bank_content');
            $data['input_source'] = $this->input->post('input_source');
            $data['bank_time'] = strtotime($this->input->post('bank_time'));
            $data['bank_code'] = $bank_code =  $this->input->post('bank_code');
            $data['updated_at'] = time();
            $data['created_at'] = time();
            $data['project_id'] = $project_id =  $this->input->post('project_id');
            if (!is_dir('upload/bank_image/')) {
                mkdir('upload/bank_image/', 0755, TRUE);
            }
            if (isset($_FILES['bank_image']) && $_FILES['bank_image']['name'] !== "") {
                $filedata         = $_FILES['bank_image']['tmp_name'];
                $thumb_path        = 'upload/bank_image/' . $bank_code . '.jpg';
                $imguser = $bank_code . '.jpg';
                $config['file_name'] = $imguser;
                $config['upload_path'] = 'upload/bank_image';
                $config['allowed_types'] = 'jpg|png';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('bank_image')) {
                    // echo $this->upload->display_errors();
                } else {
                    $this->upload->data();
                    $data['bank_image'] = $thumb_path;
                }
            }
            $arr_project[] = $project_id;
            if ($id > 0) {
                $collect_money = $this->Madmin->get_by(['id' => $id], 'collect_money');
                $project_old = $collect_money['project_id'];
                if ($project_id != $project_old) {
                    $arr_project[] = $project_old;
                }
                $update = $this->Madmin->update(['id' => $id], $data, 'collect_money');
            } else {
                $insert = $this->Madmin->insert($data, 'collect_money');
            }
            foreach ($arr_project as $val) {
                $project = $this->Madmin->get_by(['id' => $val], 'projects');
                $money = $this->Madmin->query_sql_row("SELECT SUM(money) as money_sum FROM collect_money WHERE project_id = $val AND bank_status = 1 AND delete_status = 0");
                if ($project['revenue'] - $money['money_sum'] > 0) {
                    $debt_status = 0;
                } else {
                    $debt_status = 1;
                }
                $update = $this->Madmin->update(['id' => $val], ['debt_status' => $debt_status], 'projects');
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
    public function del_job()
    {
        if (check_role() == 1 || check_role() == 2) {
            $arr_id = explode(',', $this->input->post('arr_id'));
            if ($arr_id != null) {
                foreach ($arr_id as $id) {
                    $job = $this->Madmin->query_sql_row("SELECT id,status  FROM jobs WHERE id = $id AND status = 1");
                    if ($job == null) { //nếu cong việc chưa hoàn thành
                        $ctv_job = $this->Madmin->query_sql_row("SELECT id,status  FROM ctv_jobs WHERE job_id = $id AND status = 1");
                        if ($ctv_job == null) { // nếu ctv chưa hoàn thành
                            $update_job = $this->Madmin->update(['id' => $id], ['status' => 3, 'delete_status' => 1], 'jobs');
                            $update_ctv_job = $this->Madmin->update(['job_id' => $id], ['status' => 3], 'ctv_jobs');
                            $response = [
                                'status' => 1,
                                'msg' => 'Thành công'
                            ];
                        } else {
                            $response = [
                                'status' => 0,
                                'msg' => 'Công việc đang triển khai. Không thể xóa'
                            ];
                        }
                    } else {
                        $response = [
                            'status' => 0,
                            'msg' => 'Công việc đã hoàn thành. Không thể xóa'
                        ];
                    }
                }
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Chưa chọn công việc'
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
    public function del_project()
    {
        if (check_role() == 1 || check_role() == 2) {
            $arr_id = explode(',', $this->input->post('arr_id'));
            if ($arr_id != null) {
                foreach ($arr_id as $id) {
                    $project = $this->Madmin->query_sql_row("SELECT id,status,check_index  FROM projects WHERE id = $id");
                    if ($project != null) {
                        if ($project['status'] != 1) {
                            if ($project['check_index'] != 1) {
                                $update = $this->Madmin->update(['id' => $id], ['status' => 3, 'delete_status' => 1], 'projects');
                                $update_ctv_job = $this->Madmin->update(['project_id' => $id, 'status !=' => 1], ['status' => 3], 'ctv_jobs'); // nếu ctv chưa hoàn thành thì chuyển về hủy
                                $jobs = $this->Madmin->query_sql("SELECT *  FROM jobs WHERE project_id = $id ");
                                if ($jobs != null) {
                                    foreach ($jobs as $val) {
                                        $job = $this->Madmin->query_sql_row("SELECT id,job_id,status  FROM ctv_jobs WHERE project_id = $id AND status != 1");
                                        if ($job == null) {
                                            $update_job = $this->Madmin->update(['project_id' => $id], ['status' => 3], 'jobs'); // nếu chưa giao cho ctv
                                        } else if ($job != null && $job['status'] != 1) { //nếu ctv chưa hoàn thành
                                            $update_job = $this->Madmin->update(['id' => $job['job_id']], ['status' => 3], 'jobs');
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
                                    'msg' => 'Dự án đang triển khai. Không thể xóa'
                                ];
                            }
                        } else {
                            $response = [
                                'status' => 0,
                                'msg' => 'Dự án đã hoàn thành. Không thể xóa'
                            ];
                        }
                    } else {
                        $response = [
                            'status' => 0,
                            'msg' => 'Dự án không tồn tại'
                        ];
                    }
                }
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Chưa chọn dự án'
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
    public function delete_money()
    {
        if (check_role() == 1 || check_role() == 2) {
            $arr_id = explode(',', $this->input->post('arr_id'));
            if ($arr_id != null) {
                foreach ($arr_id as $id) {
                    $user = $this->Madmin->query_sql_row("SELECT id   FROM collect_money WHERE id = $id AND bank_status = 0");
                    if ($user != null) {
                        $update = $this->Madmin->update(['id' => $id], ['delete_status' => 1], 'collect_money');
                        $response = [
                            'status' => 1,
                            'msg' => 'Thành công'
                        ];
                    } else {
                        $response = [
                            'status' => 0,
                            'msg' => 'ID không tồn tại'
                        ];
                    }
                }
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Chưa chọn ID'
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
    public function customer_project()
    {
        if (admin()) {
            if (check_role() == 7) {
                $id_u = get_id();
                $page = $this->uri->segment(2);
                if ($page < 1 || $page == '') {
                    $page = 1;
                }
                $limit = 10;
                $start = $limit * ($page - 1);
                $where = "customer_id = $id_u ";
                if ($this->input->get('id') > 0) {
                    $id_projetc = $this->input->get('id');
                    $where .= " AND projects.id = $id_projetc";
                }
                if ($this->input->get('type') > 0) {
                    $type = $this->input->get('type');
                    $where .= " AND projects.project_type = $type";
                }
                if ($this->input->get('st') > 0) {
                    $st = $this->input->get('st') - 1;
                    $where .= " AND projects.status = $st";
                }
                if ($this->input->get('hs') > 0) {
                    $hs = $this->input->get('hs') - 1;
                    $where .= " AND projects.handover_status = $hs";
                }
                if ($this->input->get('debt') > 0) {
                    $debt = $this->input->get('debt') - 1;
                    $where .= " AND projects.debt_status = $debt";
                }
                if ($this->input->get('tss') > 0) {
                    $tss = $this->input->get('tss');
                    $where .= " AND projects.time_start >= $tss";
                }
                if ($this->input->get('tse') > 0) {
                    $tse = $this->input->get('tse');
                    $where .= " AND projects.time_start <= $tse";
                }
                if ($this->input->get('tes') > 0) {
                    $tes = $this->input->get('tes');
                    $where .= " AND projects.time_end >= $tes";
                }
                if ($this->input->get('tee') > 0) {
                    $tee = $this->input->get('tee');
                    $where .= " AND projects.time_end <= $tee";
                }
                if ($this->input->get('tcs') > 0) {
                    $tcs = $this->input->get('tcs');
                    $where .= " AND projects.time_cancel >= $tcs";
                }
                if ($this->input->get('tce') > 0) {
                    $tce = $this->input->get('tce');
                    $where .= " AND projects.time_cancel <= $tce";
                }
                if ($this->input->get('tps') > 0) {
                    $tps = $this->input->get('tps');
                    $where .= " AND projects.time_pause >= $tps";
                }
                if ($this->input->get('tpe') > 0) {
                    $tpe = $this->input->get('tpe');
                    $where .= " AND projects.time_pause <= $tpe";
                }
                $project = $this->Madmin->query_sql("SELECT 
                    projects.*,
                    project_type.name AS name_project_type,project_type.price AS price_project_type
                FROM 
                    projects 
                JOIN 
                    project_type ON project_type.id = projects.project_type
                WHERE 
                    projects.delete_status = 0 AND $where
                ORDER BY 
                    projects.id DESC;
                ");
                pagination('/du-an-khach-hang/', count($project), $limit);
                $project_limit = $this->Madmin->query_sql("SELECT 
                    projects.*,
                    project_type.name AS name_project_type,project_type.price AS price_project_type
                FROM 
                    projects 
                JOIN 
                    project_type ON project_type.id = projects.project_type
                WHERE 
                    projects.delete_status = 0 AND $where
                ORDER BY 
                    projects.id DESC LIMIT $start,$limit;
                ");
                $data['project'] = $project_limit;
                $data['project_type'] = $this->Madmin->query_sql("SELECT project_type.id,project_type.name  FROM projects JOIN project_type ON projects.project_type = project_type.id WHERE projects.customer_id = $id_u AND projects.delete_status = 0 GROUP BY projects.project_type ORDER BY name ASC");
                $data['filter_project'] = $this->Madmin->query_sql("SELECT id FROM projects WHERE customer_id = $id_u AND delete_status = 0 ");


                $data['canonical'] = base_url('quan-ly-du-an/');
                $data['meta_title'] = 'Quản lý dự án';
                $data['content'] = 'customer/project';
                $data['list_js'] = [
                    'customer/project.js',
                ];
                $data['list_css'] = [
                    'manager/project.css'
                ];
                return $this->load->view('index', $data);
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
}
