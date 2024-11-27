<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Job extends CI_Controller
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
    public function ctv_job()
    {
        if (check_role() == 5) {
            $id_u = get_id();
            $page = $this->uri->segment(2);
            if ($page < 1 || $page == '') {
                $page = 1;
            }
            $limit = 10;
            $start = $limit * ($page - 1);
            $id = $_SESSION['user']['id'];
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
            if ($this->input->get('sqa') > 0) {
                $sqa = $this->input->get('sqa');
                $sqa = $sqa - 1;
                $where .= " AND ctv_jobs.status_qa_check = $sqa";
            }
            if ($this->input->get('cr') > 0) {
                $cr = $this->input->get('cr');
                if ($cr == 4) {
                    $cr = 0;
                }
                $where .= " AND ctv_jobs.check_replly = $cr";
            }
            if ($this->input->get('sctv') != 0) {
                $sctv = $this->input->get('sctv');
                if ($sctv == 1) {
                    $where .= " AND ( ctv_jobs.status = 1 OR  ctv_jobs.status = 2)";
                } else if ($sctv == 4) {
                    $where .= " AND ctv_jobs.status = 0";
                } else {
                    $where .= " AND ctv_jobs.status = $sctv";
                }
            }
            if ($this->input->get('cs') > 0) {
                $created_start = $this->input->get('cs');
                $where .= " AND ctv_jobs.created_at >= $created_start";
            }
            if ($this->input->get('ce') > 0) {
                $created_end = $this->input->get('ce');
                $where .= " AND ctv_jobs.created_at <= $created_end";
            }
            if ($this->input->get('dls') > 0) {
                $dls = $this->input->get('dls');
                $where .= " AND ctv_jobs.deadline >= $dls";
            }
            if ($this->input->get('dle') > 0) {
                $dle = $this->input->get('dle');
                $where .= " AND ctv_jobs.deadline <= $dle";
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
            $ctv_jobs = $this->Madmin->query_sql("SELECT ctv_jobs.*,code,file_job,website,file,job_type,note_ctv,jobs.num_job_type,jobs.price,punish,jobs.info as job_info, job_type.name as name_job_type FROM ctv_jobs 
            JOIN projects On projects.id = ctv_jobs.project_id 
            JOIN jobs On jobs.id = ctv_jobs.job_id 
            JOIN job_type On job_type.id = jobs.job_type 
            WHERE ctv_jobs.ctv= $id $where ");
            pagination('/cong-viec-cong-tac-vien/', count($ctv_jobs), $limit);
            $ctv_jobs_limit = $this->Madmin->query_sql("SELECT ctv_jobs.*,code,file_job,website,file,job_type,note_ctv,jobs.num_job_type,jobs.price,punish,jobs.info as job_info, job_type.name as name_job_type FROM ctv_jobs 
            JOIN projects On projects.id = ctv_jobs.project_id 
            JOIN jobs On jobs.id = ctv_jobs.job_id 
            JOIN job_type On job_type.id = jobs.job_type 
            WHERE ctv_jobs.ctv= $id $where ORDER BY jobs.z_index DESC,ctv_jobs.created_at LIMIT $start,$limit ");
            $data['ctv_jobs'] = $ctv_jobs_limit;
            $data['job_type'] = $this->Madmin->query_sql("SELECT job_type.id,job_type.name  FROM job_type JOIN jobs On jobs.job_type = job_type.id JOIN ctv_jobs On ctv_jobs.job_id = jobs.id WHERE ctv = $id GROUP BY job_type.id ORDER BY job_type.name ASC");
            $data['filter_job'] = $this->Madmin->query_sql("SELECT jobs.id,jobs.code FROM jobs  JOIN ctv_jobs On ctv_jobs.job_id = jobs.id  WHERE ctv_jobs.ctv = $id  ORDER BY ctv_jobs.project_id ASC,ctv_jobs.job_id ASC");
            $data['website'] = $this->Madmin->query_sql("SELECT DISTINCT projects.website FROM projects JOIN ctv_jobs On ctv_jobs.project_id = projects.id WHERE ctv_jobs.ctv = $id ");
            $data['advanced_filter'] = $this->Madmin->get_by(" user_id = $id_u AND page_id = 4 ", 'advanced_filter');
            $data['canonical'] = base_url('cong-viec-cong-tac-vien/');
            $data['meta_title'] = 'Công việc cộng tác viên';
            $data['content'] = 'jobs/ctv';
            $data['list_js'] = [
                'job/ctv.js',
            ];
            $data['list_css'] = [
                'job/ctv.css'
            ];
            return $this->load->view('index', $data);
        } else {
            set_status_header(404);
            return $this->load->view('errors/html/error_role');
        }
    }
    public function qa_job()
    {
        if (check_role() == 4) {
            $page = $this->uri->segment(2);
            if ($page < 1 || $page == '') {
                $page = 1;
            }
            $limit = 10;
            $start = $limit * ($page - 1);
            $id_u = $_SESSION['user']['id'];
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
            if ($this->input->get('dls') > 0) {
                $dls = $this->input->get('dls');
                $where .= " AND ctv_jobs.deadline >= $dls";
            }
            if ($this->input->get('dle') > 0) {
                $dle = $this->input->get('dle');
                $where .= " AND ctv_jobs.deadline <= $dle";
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
            if ($this->input->get('ctv') > 0) {
                $ctv = $this->input->get('ctv');
                $where .= " AND ctv_jobs.ctv = $ctv";
            }
            if ($this->input->get('cr') > 0) {
                $cr = $this->input->get('cr');
                if ($cr == 4) {
                    $cr = 0;
                }
                $where .= " AND ctv_jobs.check_replly = $cr";
            }
            if ($this->input->get('sj') > 0) {
                $sj = $this->input->get('sj');
                if ($sj == 5) {
                    $where .= " AND jobs.status = 3";
                } elseif ($sj == 4) {
                    $where .= " AND ctv_jobs.status_qa_check = 0 AND jobs.status != 3";
                } else {
                    $where .= " AND ctv_jobs.status_qa_check = $sj";
                }
            }
            if ($this->input->get('sin') > 0) {
                $sin = $this->input->get('sin');
                if ($sin == 1) {
                    $where .= " AND jobs.status_index = 1 AND projects.check_index > 0 AND projects.check_index < 4";
                } elseif ($sin == 2) {
                    $where .= " AND jobs.status_index = 1 AND ( projects.check_index <= 0 OR projects.check_index >= 4)";
                } elseif ($sin == 3) {
                    $where .= " AND jobs.status_index = 0";
                }
            }
            $jobs = $this->Madmin->query_sql("SELECT jobs.*,
            website,file,users.name as name_author,users.role as author_role,check_index,projects.delete_status as del_project,projects.status as status_project,
            ctv_jobs.id as ctv_job_id,ctv_jobs.ctv as ctv_job_ctv,ctv_jobs.deadline as ctv_job_deadline,ctv_jobs.completion_time as ctv_job_completion_time,ctv_jobs.content_qa_check as ctv_job_content_qa_check,ctv_jobs.status_qa_check as ctv_job_status_qa_check,ctv_jobs.time_qa_check as ctv_job_time_qa_check,ctv_jobs.file_qa_check as ctv_job_file_qa_check,ctv_jobs.check_replly as ctv_job_check_replly,ctv_jobs.status as ctv_job_status
            FROM jobs
            LEFT JOIN users ON users.id = jobs.author  
            LEFT JOIN projects ON projects.id = jobs.project_id 
            LEFT JOIN ctv_jobs ON ctv_jobs.job_id = jobs.id 
            WHERE jobs.status_qa = 1 $where ORDER BY CASE WHEN jobs.status = 3 THEN 1 ELSE 0 END, jobs.status ASC, jobs.id DESC;");
            pagination('/cong-viec-qa/', count($jobs), $limit);
            $jobs_limit = $this->Madmin->query_sql("SELECT jobs.*,website,file,users.name as name_author,users.role as author_role,check_index,projects.delete_status as del_project,projects.status as status_project,
            ctv_jobs.id as ctv_job_id,ctv_jobs.ctv as ctv_job_ctv,ctv_jobs.deadline as ctv_job_deadline,ctv_jobs.completion_time as ctv_job_completion_time,ctv_jobs.content_qa_check as ctv_job_content_qa_check,ctv_jobs.status_qa_check as ctv_job_status_qa_check,ctv_jobs.time_qa_check as ctv_job_time_qa_check,ctv_jobs.file_qa_check as ctv_job_file_qa_check,ctv_jobs.check_replly as ctv_job_check_replly,ctv_jobs.status as ctv_job_status
            FROM jobs
            LEFT JOIN users ON users.id = jobs.author 
            LEFT JOIN projects ON projects.id = jobs.project_id 
            LEFT JOIN ctv_jobs ON ctv_jobs.job_id = jobs.id 
            WHERE jobs.status_qa = 1 $where ORDER BY CASE WHEN jobs.status = 3 THEN 1 ELSE 0 END, jobs.status ASC, jobs.id DESC LIMIT $start,$limit");
            $data['jobs'] = $jobs_limit;
            $data['job_types'] = $this->Madmin->query_sql("SELECT job_type.id,job_type.name,job_type.status,job_type.delete_status  FROM jobs JOIN job_type ON job_type.id = jobs.job_type WHERE jobs.delete_status = 0 AND jobs.status_qa =1 GROUP BY job_type  ORDER BY job_type.name ASC");
            $data['ctv'] = $this->Madmin->query_sql("SELECT DISTINCT  users.id,users.name FROM jobs LEFT JOIN ctv_jobs ON ctv_jobs.job_id = jobs.id  JOIN users ON users.id = ctv_jobs.ctv where role=5 AND jobs.status = 1 AND jobs.delete_status = 0 ORDER BY users.name ASC");
            $data['filter_job'] = $this->Madmin->query_sql("SELECT id,code FROM jobs WHERE status_qa = 1 ORDER BY project_id ASC");
            $data['website'] = $this->Madmin->query_sql("SELECT DISTINCT website FROM projects JOIN jobs ON jobs.project_id=projects.id WHERE jobs.status_qa=1 ");
            $data['author'] = $this->Madmin->query_sql("SELECT  users.id,users.name,users.role FROM jobs JOIN users ON users.id = jobs.author WHERE delete_status = 0 GROUP BY jobs.author  ORDER BY users.name ASC");
            $data['advanced_filter'] = $this->Madmin->get_by(" user_id = $id_u AND page_id = 5 ", 'advanced_filter');
            $data['canonical'] = base_url('cong-viec-cong-tac-vien/');
            $data['meta_title'] = 'Công việc QA';
            $data['content'] = 'jobs/qa';
            $data['list_js'] = [
                'job/qa.js',
            ];
            $data['list_css'] = [
                'job/qa.css'
            ];
            return $this->load->view('index', $data);
        } else {
            set_status_header(404);
            return $this->load->view('errors/html/error_role');
        }
    }
    public function qa_add_job()
    {
        if (admin()) {
            if (check_role() != 4) {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            } else {
                $data['job_type'] = $this->Madmin->query_sql("SELECT id,name  FROM job_type WHERE status = 1 AND delete_status = 0");
                $data['projects'] = $this->Madmin->query_sql("SELECT id,status_index  FROM projects WHERE delete_status = 0 ");
                $data['ctv'] = $this->Madmin->query_sql("SELECT id,name  FROM users where role=5 AND status = 1  AND delete_user = 0");
                $data['canonical'] = base_url('quan-ly-du-an/');
                $data['meta_title'] = 'Thêm công việc';
                $data['content'] = 'jobs/add_job';
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
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function index_job()
    {
        if (check_role() == 3) {
            $page = $this->uri->segment(2);
            if ($page < 1 || $page == '') {
                $page = 1;
            }
            $limit = 10;
            $start = $limit * ($page - 1);
            $id = $_SESSION['user']['id'];
            $where = " AND id > 0 ";
            if ($this->input->get('id') > 0) {
                $id_projetc = $this->input->get('id');
                $where .= " AND id = $id_projetc";
            }
            if ($this->input->get('web') != '') {
                $web = $this->input->get('web');
                $where .= " AND website LIKE '$web'";
            }
            if ($this->input->get('st') > 0) {
                $st = $this->input->get('st');
                if ($st == 5) {
                    $where .= " AND status = 3";
                } else {
                    $where .= " AND check_index = $st  AND status != 3";
                }
            }
            if ($this->input->get('dls') > 0) {
                $dls = $this->input->get('dls');
                $where .= " AND deadline >= $dls";
            }
            if ($this->input->get('dle') > 0) {
                $dle = $this->input->get('dle');
                $where .= " AND deadline <= $dle";
            }
            if ($this->input->get('tis') > 0) {
                $tis = $this->input->get('tis');
                $where .= " AND time_index >= $tis";
            }
            if ($this->input->get('tie') > 0) {
                $tie = $this->input->get('tie');
                $where .= " AND time_index <= $tie";
            }
            if ($this->input->get('tns') > 0) {
                $tns = $this->input->get('tns');
                $where .= " AND time_index_next >= $tns";
            }
            if ($this->input->get('tne') > 0) {
                $tne = $this->input->get('tne');
                $where .= " AND time_index_next <= $tne";
            }
            if ($this->input->get('au') > 0) {
                $au = $this->input->get('au');
                $where .= " AND user_check_index = $au";
            }
            $project = $this->Madmin->query_sql("SELECT * FROM projects WHERE status_index= 1  $where ORDER BY CASE WHEN check_index = 3 THEN 0 ELSE 1 END, check_index ASC, CASE WHEN status = 2 THEN 0 ELSE 1 END, status DESC;");
            pagination('/cong-viec-index/', count($project), $limit);
            $projects_limit = $this->Madmin->query_sql("SELECT * FROM projects WHERE status_index= 1  $where ORDER BY CASE WHEN check_index = 3 THEN 0 ELSE 1 END, check_index ASC, CASE WHEN status = 2 THEN 0 ELSE 1 END, status DESC LIMIT $start,$limit");
            $data['project'] = $projects_limit;
            $data['filter_project'] = $this->Madmin->query_sql("SELECT id FROM projects WHERE status_index= 1 ");
            $data['website'] = $this->Madmin->query_sql("SELECT DISTINCT website FROM projects WHERE status_index= 1");
            $data['author'] = $this->Madmin->query_sql("SELECT id,name,role  FROM users  ORDER BY name ASC");
            $data['canonical'] = base_url('cong-viec-cong-tac-vien/');
            $data['meta_title'] = 'Công việc index';
            $data['content'] = 'jobs/index';
            $data['list_js'] = [
                'job/index.js',
            ];
            $data['list_css'] = [
                'job/index.css'
            ];
            return $this->load->view('index', $data);
        } else {
            set_status_header(404);
            return $this->load->view('errors/html/error_role');
        }
    }
    public function change_ctv_job()
    {
        if (check_role() != 5) {
            $response = [
                'status' => 0,
                'msg' => 'Không có quyền thao tác'
            ];
        } else {
            $time = time();
            $id_u = $_SESSION['user']['id'];
            $id =  $this->input->post('id');
            $data['status'] = 1;
            $data['completion_time'] = $time;
            $check = $this->Madmin->get_by(['id' => $id, 'ctv' => $id_u, 'status' => 0], 'ctv_jobs');
            if ($check != null) {
                $check_qa = $this->Madmin->get_by(['id' => $check['job_id'], 'status' => 0], 'jobs');
                if ($check_qa != null && $check_qa['status_qa'] == 1) {
                    $data['status_qa_check'] = 2;
                } else { // nếu không cần QA check
                    $money_job = $check_qa['price'];
                    $money = $_SESSION['user']['money'] + $money_job;
                    $update = $this->Madmin->update(['id' => $id_u], ['money' => $money], 'users');
                    $data_job['completion_time'] = $time;
                    $data_job['status'] = 1;
                    $update_job = $this->Madmin->update(['id' => $check['job_id']], $data_job, 'jobs');
                }
                $update = $this->Madmin->update(['id' => $id], $data, 'ctv_jobs');
                //
                $this->ctv_status_project($check['project_id']);
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Công việc không tồn tại. Vui lòng kiểm tra lại'
                ];
            }
        }
        echo json_encode($response);
    }
    public function change_check_replly()
    {
        if (check_role() != 5) {
            $response = [
                'status' => 0,
                'msg' => 'Không có quyền thao tác'
            ];
        } else {
            $id_u = $_SESSION['user']['id'];
            $id =  $this->input->post('id');
            $data['check_replly'] = $value = $this->input->post('value');
            $check = $this->Madmin->get_by(['id' => $id, 'ctv' => $id_u, 'check_replly' => 1, 'status !=' => 3], 'ctv_jobs');
            if ($check != null) {
                if ($value == 3) {
                    $data['status_qa_check'] = 3;
                } elseif ($value == 2) {
                    $job = $this->Madmin->get_by(['id' => $check['job_id']], 'jobs');
                    $money_job = $job['price'] - $job['punish'];
                    $money = $_SESSION['user']['money'] + $money_job;
                    $update = $this->Madmin->update(['id' => $id_u], ['money' => $money], 'users');
                    $update = $this->Madmin->update(['id' => $check['job_id']], ['status' => 1], 'jobs');
                }
                $update = $this->Madmin->update(['id' => $id], $data, 'ctv_jobs');
                $id_project = $check['project_id'];
                if ($value == 2) {
                    $this->ctv_status_project($id_project);
                }
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Công việc không tồn tại. Vui lòng kiểm tra lại'
                ];
            }
        }
        echo json_encode($response);
    }
    public function ctv_status_project($id)
    {
        $time = time();
        $check_project = $this->Madmin->query_sql_row("SELECT id,status_index,check_index FROM projects WHERE id = $id"); // check dự án cần index không
        $check_job = $this->Madmin->num_rows(['status' => 0, 'project_id' => $id, 'delete_status' => 0], 'jobs'); // check còn công việc chưa hoàn thành không
        $check_job_index = $this->Madmin->num_rows(['status' => 0, 'project_id' => $id, 'status_index' => 1, 'delete_status' => 0], 'jobs'); // check còn công việc chưa hoàn thành không
        if ($check_project['status_index'] == 0 && $check_job == 0) { // nếu dự án k cần index và các công việc hoàn thành
            $update_project = $this->Madmin->update(['id' => $id], ['status' => 1, 'time_end' => $time], 'projects'); // hoàn thành công việc
        } elseif ($check_project['status_index'] == 1  && $check_job == 0) { // nếu cần check index và các công việc đã hoàn thành
            if ($check_project['check_index'] == 1) { // nếu đã đưuọc check index
                $update_project = $this->Madmin->update(['id' => $id], ['status' => 1, 'time_end' => $time], 'projects'); // hoàn thành công việc
            } elseif ($check_project['check_index'] != 1) { // nếu chưa đưuọc check index
                $update_index = $this->Madmin->update(['id' => $id], ['check_index' => 3], 'projects'); //chuyển qua index check
            }
        } elseif ($check_job != 0 && $check_job_index == 0) { //công việc chưa hoàn thành nhưng các công việc cần index đã hoàn thành
            $update_index = $this->Madmin->update(['id' => $id], ['check_index' => 3], 'projects'); //chuyển qua index check
        }
    }
    public function next_index()
    {
        if (check_role() != 4) {
            $response = [
                'status' => 0,
                'msg' => 'Không có quyền thao tác'
            ];
        } else {
            $id =  $this->input->post('id');
            $check = $this->Madmin->get_by("id = $id AND status_index = 1 AND status != 1 AND check_index != 1 AND delete_status = 0", 'projects');
            if ($check != null) {
                // $check_2 = $this->Madmin->num_rows("status != 1 AND status_index = 1 AND delete_status  = 0 AND project_id = $id", 'jobs'); // check xem dự án có công việc nào cần index mà chưa hoàn thành không
                // if ($check_2 == 0) {
                $update_index = $this->Madmin->update(['id' => $id], ['check_index' => 3], 'projects'); //chuyển qua index check
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
                // } else {
                //     $response = [
                //         'status' => 0,
                //         'msg' => 'Tất cả công việc của dự án chưa hoàn thành. Vui lòng kiểm tra lại'
                //     ];
                // }
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Dự án không tồn tại. Vui lòng kiểm tra lại'
                ];
            }
        }
        echo json_encode($response);
    }
    public function get_job_index()
    {
        if (check_role() != 3) {
            $response = [
                'status' => 0,
                'msg' => 'Không có quyền thao tác'
            ];
        } else {
            $id =  $this->input->post('id');
            $check = $this->Madmin->get_by(['id' => $id, 'check_index' => 3, 'status_index' => 1], 'projects');
            if ($check != null) {
                $check_index = $check['check_index'];
                $time_index_next = ($check['time_index_next'] > 0) ? date('Y-m-d\TH:i', $check['time_index_next']) : '';
                $check_real = 0;
                $data_index_real = json_decode($check['data_index']);
                if ($check['data_index_real'] != '') {
                    $data_index_real = json_decode($check['data_index_real']);
                    if ($data_index_real != null) {
                        $check_real = 1;
                    }
                }
                if ($data_index_real != null) {
                    foreach ($data_index_real as &$val) {
                        $val->id_i = $val->name;
                        $val->name = get_job_index($val->name);
                    }
                }
                $response = [
                    'status' => 1,
                    'check_index' => $check_index,
                    'time_index_next' => $time_index_next,
                    'data_index_real' => $data_index_real,
                    'check_real' => $check_real,
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Dự án không tồn tại. Vui lòng kiểm tra lại'
                ];
            }
        }
        echo json_encode($response);
    }
    public function edit_job_index()
    {
        if (check_role() != 3) {
            $response = [
                'status' => 0,
                'msg' => 'Không có quyền thao tác'
            ];
        } else {
            $id =  $this->input->post('id');
            $id_u = $_SESSION['user']['id'];
            $data['user_check_index'] = $id_u;
            $status = $this->input->post('status');
            $data_index =  $this->input->post('data_index');
            $data_index_real =  json_encode($data_index);
            if ($data_index_real != 'null') {
                $data['data_index_real'] = $data_index_real;
            }
            $time_index_next = $this->input->post('time_next');
            if ($time_index_next > 0) {
                $data['time_index_next'] = strtotime($time_index_next);
            }
            if ($status == 1) {
                $data['check_index'] = $status;
                $data['time_index'] = time();
            }
            $check = $this->Madmin->get_by(['id' => $id, 'status_index' => 1, 'delete_status' => 0], 'projects');
            if ($check != null && $check['status'] == 2) {
                $check_project = $this->Madmin->num_rows(['project_id' => $id, 'status' => 0, 'delete_status' => 0], 'jobs');
                if ($check_project == 0 && $status == 1) {
                    $data['status'] = 1;
                    $data['time_end'] = time();
                }
                $update = $this->Madmin->update(['id' => $id], $data, 'projects');
                $response = [
                    'status' => 1,
                    'msg' => 'Thành công'
                ];
            } elseif ($check != null && $check['status'] == 0) {
                $response = [
                    'status' => 0,
                    'msg' => 'Dự án đang chốt thông tin. Vui lòng kiểm tra lại'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Dự án không tồn tại. Vui lòng kiểm tra lại'
                ];
            }
        }
        echo json_encode($response);
    }
    public function get_job_qa()
    {
        if (check_role() != 4) {
            $response = [
                'status' => 0,
                'msg' => 'Không có quyền thao tác'
            ];
        } else {
            $id =  $this->input->post('id');
            $check = $this->Madmin->query_sql_row("SELECT jobs.id,jobs.status,punish,file_qa_check,content_qa_check,status_qa_check FROM jobs  JOIN ctv_jobs On ctv_jobs.job_id = jobs.id  WHERE jobs.id = $id ");
            if ($check != null) {
                $response = [
                    'status' => 1,
                    'status_job' => $check['status'],
                    'punish' => $check['punish'],
                    'file_qa_check' => $check['file_qa_check'],
                    'content_qa_check' => str_replace('<br>', '\r\n', $check['content_qa_check']),
                    'name' => status_qa_check($check['status_qa_check']),
                    'status_qa_check' => $check['status_qa_check'],
                    'msg' => 'Thành công'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Công việc không tồn tại. Vui lòng kiểm tra lại'
                ];
            }
        }
        echo json_encode($response);
    }
    public function edit_job_qa()
    {
        if (check_role() != 4) {
            $response = [
                'status' => 0,
                'msg' => 'Không có quyền thao tác'
            ];
        } else {
            $id_u = $_SESSION['user']['id'];
            $id =  $this->input->post('id');
            $status = $this->input->post('status');
            $data['content_qa_check'] =  $this->input->post('content_qa_check');
            $data['file_qa_check'] =  $this->input->post('file_qa_check');
            $data['qa_id'] = $id_u;
            $data['time_qa_check'] = time();
            if ($status == 1) {
                $data['status_qa_check'] = $status;
                $data['check_replly'] = 1;
            }
            $punish['punish'] = $this->input->post('punish');
            $check = $this->Madmin->get_by(['id' => $id, 'delete_status' => 0], 'jobs');
            if ($check != null) {
                $check_2 = $this->Madmin->get_by("job_id = $id ", 'ctv_jobs');
                if ($check_2 != null) {
                    if ($check_2['status'] == 1 &&  $check_2['status_qa_check'] != 0) {
                        $update = $this->Madmin->update(['job_id' => $id], $data, 'ctv_jobs');
                        $punish['completion_time'] = time();
                        $update = $this->Madmin->update(['id' => $id], $punish, 'jobs');
                        $response = [
                            'status' => 1,
                            'msg' => 'Thành công'
                        ];
                    } elseif ($check_2['check_replly'] == 2) {
                        $response = [
                            'status' => 0,
                            'msg' => 'Công việc đã hoàn thành. Vui lòng kiểm tra lại'
                        ];
                    } else {
                        $response = [
                            'status' => 0,
                            'msg' => 'CTV chưa gửi bài . Vui lòng kiểm tra lại'
                        ];
                    }
                } else {
                    $response = [
                        'status' => 0,
                        'msg' => 'Công việc chưa được giao . Vui lòng kiểm tra lại'
                    ];
                }
            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'Công việc không tồn tại. Vui lòng kiểm tra lại'
                ];
            }
        }
        echo json_encode($response);
    }
}
