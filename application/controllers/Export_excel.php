<?php
error_reporting(1);
defined('BASEPATH') or exit('No direct script access allowed');
class Export_excel extends CI_Controller
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
    public function excel_projects()
    {
        if (admin()) {
            if (check_role() == 6) {
                $alias = str_replace('excel_projects', 'excel_projects_mkt', $_SERVER['REQUEST_URI']);
                return redirect($alias);
            }
            if (check_role() == 1 || check_role() == 2) {
                $where = "projects.id > 0 ";
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
                    $having .= " AND FIND_IN_SET('$ctv', ctv_work) > 0 ";
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
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Danh_sach_du_an.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th rowspan="3">STT</th>
                            <th rowspan="3">
                                <div>Mã dự án</div>
                            </th>
                            <th rowspan="3">
                                <div>Thời gian tạo dự án</div>
                            </th>
                            <th rowspan="3">
                                <div>P.I.C dự án</div>
                            </th>
                            <th rowspan="3">
                                <div>Khách hàng</div>
                            </th>
                            <th rowspan="3">
                                <div>Doanh thu</div>
                            </th>
                            <th rowspan="3">
                                <div>Đã thu</div>
                            </th>
                            <th rowspan="3">
                                <div>Công nợ</div>
                            </th>
                            <th rowspan="3">
                                <div>Trạng thái công nợ</div>
                            </th>
                            <th rowspan="3">
                                <div>Thời gian dục khách hàng</div>
                            </th>
                            <th colspan="5" class="th_col">Trạng thái triển khai</th>
                            <th rowspan="3">
                                <div>Trạng thái bàn giao</div>
                            </th>
                            <th rowspan="3">
                                <div>Website dự án</div>
                            </th>
                            <th rowspan="3">
                                <div>Loại dự án</div>
                            </th>
                            <th rowspan="3">
                                <div>Thông tin dự án</div>
                            </th>
                            <th rowspan="3">
                                <div>Deadline dự án</div>
                            </th>
                            <th rowspan="3">
                                <div>Loại công việc</div>
                            </th>
                            <th rowspan="3">
                                <div>Tiến độ phân dự án</div>
                            </th>
                            <th colspan="10" class="th_col">Tiến độ dự án</th>
                            <th rowspan="3">
                                <div>File dự án</div>
                            </th>
                            <th rowspan="3">
                                <div>Chi phí thuê CTV</div>
                            </th>
                            <th rowspan="3">
                                <div>CTV thực hiện dự án</div>
                            </th>
                            <th rowspan="3">
                                <div>Ghi chú index</div>
                            </th>
                            <th rowspan="3">
                                <div>Ghi chú</div>
                            </th>
                        </tr>
                        <tr>
                            <th rowspan="2" class="col_color">Trạng thái</th>
                            <th rowspan="2" class="col_color">Thời gian đang triển khai</th>
                            <th rowspan="2" class="col_color">Thời gian hoàn thành</th>
                            <th rowspan="2" class="col_color">Thời gian hủy dự án</th>
                            <th rowspan="2" class="col_color">Thời gian tạm dừng</th>
                            <th colspan="2">CTV</th>
                            <th colspan="3">QA</th>
                            <th colspan="5">Indexed</th>
                        </tr>
                        <tr>
                            <th>Trạng thái CTV</th>
                            <th>Thời gian cập nhật CTV</th>
                            <th>Người duyệt QA</th>
                            <th>Trạng thái QA</th>
                            <th>Thời gian cập nhật QA</th>
                            <th>Người duyệt Indexed</th>
                            <th>Trạng thái</th>
                            <th>Thời gian cập nhật</th>
                            <th>Tỉ lệ index thực tế</th>
                            <th>Tỉ lệ mong muốn</th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($project as $key => $val) {
                    $check_ct = '';
                    $ctv_work = explode(',', $val['ctv_work']);
                    $qa_check = explode(',', $val['qa_check']);
                    $time_qa_check_new = time_qa_check_new(['project_id' => $val['id'], 'status' => 1]);
                    $arr_time_urges = explode(',', $val['time_urges']);
                    if ($arr_time_urges != null && $this->input->get('tus') > 0 && $check_ct == "") {
                        $check_ct = " cts_false ";
                        foreach ($arr_time_urges as $val_1) {
                            if ($val_1 > 0 && $val_1 > $this->input->get('tus')) {
                                $check_ct = "";
                                break;
                            }
                        }
                    }
                    if ($arr_time_urges != null && $this->input->get('tue') > 0 && $check_ct == "") {
                        $check_ct = " cts_false ";
                        foreach ($arr_time_urges as $val_1) {
                            if ($val_1 > 0 && $val_1 < $this->input->get('tue')) {
                                $check_ct = "";
                                break;
                            }
                        }
                    }
                    $jobs = fn_get_list('job_type', ['project_id' => $val['id'], 'delete_status' => 0], 'jobs');
                    $this_cusommer =  fn_get_row('name,username', ['id' => $val['customer_id']], 'users');
                    $money = fn_get_row('SUM(money) as money_sum', ['project_id' => $val['id'], 'bank_status' => 1, 'delete_status' => 0], 'collect_money');
                    $this_debt = (number_format($val['revenue'] - $money['money_sum']) > 0) ? number_format($val['revenue'] - $money['money_sum']) : 0;
                    $text_urges = 'Đã báo ' . (($val['time_urges'] != '') ? count($arr_time_urges) : 0) . ' lần';
                    $html_job = '';
                    foreach ($jobs as $val_job) {
                        $job_type = fn_get_row('name', ['id' => $val_job['job_type']], 'job_type');
                        $html_job .= '<p class="text-center">' . $job_type['name'] . "</p>";
                    }
                    $html_qa_check = '';
                    if ($qa_check != null) {
                        foreach ($qa_check as $val2) {
                            $html_qa_check .= '<p>' . $val2 . '</p>';
                        }
                    }
                    $html_data_index_real = '';
                    if ($val['status_index'] == 1 && $val['data_index_real'] != '') {
                        $data_index_real = json_decode($val['data_index_real']);
                        foreach ($data_index_real as  $val_index) {
                            $this_index = fn_get_row('name', ['id' => $val_index->name], 'job_index');
                            $html_data_index_real .= '<p>' . $this_index['name'] . ': ' . $val_index->number . '%</p>';
                        }
                    }
                    $html_data_index = '';
                    if ($val['status_index'] == 1 && $val['data_index'] != '') {
                        $data_index = json_decode($val['data_index']);
                        if ($data_index != null) {
                            foreach ($data_index as  $val_index) {
                                $this_index = fn_get_row('name', ['id' => $val_index->name], 'job_index');
                                $html_data_index .= '<p>' . $this_index['name'] . ': ' . $val_index->number . '%</p>';
                            }
                        }
                    }
                    $html_ctv_work = '';
                    foreach ($ctv_work as $val_work) {
                        $html_ctv_work .= '<p style="text-align:center">' . get_name($val_work) . '</p>';
                    }
                    $text_time_start = ($val['time_start'] > 0) ? date('d/m/Y H:i', $val['time_start']) : '';
                    $text_time_end = ($val['time_end'] > 0) ? date('d/m/Y H:i', $val['time_end']) : '';
                    $text_time_cancel = ($val['time_cancel'] > 0) ? date('d/m/Y H:i', $val['time_cancel']) : '';
                    $text_time_pause = ($val['time_pause'] > 0) ? date('d/m/Y H:i', $val['time_pause']) : '';
                    $text_deadline = ($val['deadline'] > 0) ? date('d/m/Y H:i', $val['deadline']) : '';
                    $text_ctv_job_completion_time = ($val['ctv_job_completion_time'] > 0) ? date('d/m/Y H:i', $val['ctv_job_completion_time']) : '';
                    $text_time_qa_check = ($time_qa_check_new['time_qa_check'] > 0) ? date('d/m/Y H:i', $time_qa_check_new['time_qa_check']) : '';
                    $text_time_index = ($val['time_index'] > 0) ? date('d/m/Y H:i', $val['time_index']) : '';
                    $text_time_end = ($val['time_end'] > 0) ? date('d/m/Y H:i', $val['time_end']) : '';
                    $stt_pd = (($val['ctv_job_count'] == 0 || $val['job_count'] == 0) ? 'chua_phan' : 'da_phan');
                    if ($check_ct == '') {
                        echo '
                   <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . project_id($val['id']) . '</td>
                                    <td>' . date('d/m/Y H:i', $val['created_at']) . '</td>
                                    <td>' . $val['name_author'] . '</td>
                                    <td>' . $this_cusommer['name'] . '</td>
                                    <td>' . number_format($val['revenue']) . ' đ</td>
                                    <td>' . number_format($money['money_sum']) . '</td>
                                    <td>' . $this_debt . '</td>
                                    <td>' . debt_status($val['debt_status']) . '</td>
                                    <td>' . $text_urges . '</td>
                                    <td>' . status_project($val['status']) . '</td>
                                    <td>' . $text_time_start . '</td>
                                    <td>' . $text_time_end . '</td>
                                    <td>' . $text_time_cancel . '</td>
                                    <td>' . $text_time_pause . '</td>
                                    <td>' . handover_status($val['handover_status']) . '</td>
                                    <td><a target="_blank" href="' . $val['website'] . '">' . $val['website'] . '</a></td>
                                    <td>' . $val['name_project_type'] . '</td>
                                    <td>' . nl2br($val['info']) . '</td>
                                    <td>' . $text_deadline . '</td>
                                    <td>' . $html_job . '</td>
                                    <td>' . project_division($val['ctv_job_count'], $val['job_count']) . '</td>
                                    <td>' . ctv_success($val['num_ctv_job_success'], $val['job_count']) . ' </td>
                                    <td>' . $text_ctv_job_completion_time . '</td>
                                    <td>' . $html_qa_check . '</td>
                                    <td>' . job_qa_success($val['job_ctv'], $val['job_qa_success'], $val['job_qa']) . '</td>
                                    <td>' . $text_time_qa_check . '</td>
                                    <td>' . get_name($val['user_check_index']) . '</td>
                                    <td>' . project_status_index($val['check_index']) . '</td>
                                    <td>' . $text_time_index . '</td>
                                    <td>' . $html_data_index_real . '</td>
                                    <td>' . $html_data_index . '</td>
                                    <td><a target="_blank" href="' . $val['file'] . '">' . $val['file'] . '</a></td>
                                    <td>' . number_format($val['job_price']) . '</td>
                                    <td>' . $html_ctv_work . '</td>
                                    <td>' . nl2br($val['note_index']) . '</td>
                                    <td>' . nl2br($val['note']) . '</td>
                                </tr>
                   ';
                    }
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function excel_projects_mkt()
    {
        if (admin()) {
            if (check_role() == 6) {
                $id_u = get_id();
                $where = "projects.id > 0 AND projects.author = $id_u ";
                if ($this->input->get('id') > 0) {
                    $id_projetc = $this->input->get('id');
                    $where .= " AND projects.id = $id_projetc";
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
                $project = $this->Madmin->query_sql("SELECT 
                    projects.*,
                    users.name AS name_author,
                    users.role AS role_author,
                    project_type.name AS name_project_type
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
                    WHERE 
                        projects.delete_status = 0 AND $where
                    GROUP BY 
                        projects.id, users.name, users.role, project_type.name
                    ORDER BY 
                    projects.id DESC ;
                ");
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Danh_sach_du_an.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th>STT</th>
                            <th>
                                <div>Mã dự án</div>
                            </th>
                            <th>
                                <div>Thời gian tạo dự án</div>
                            </th>
                            <th>
                                <div>Khách hàng</div>
                            </th>
                            <th>
                                <div>Website dự án</div>
                            </th>
                            <th>
                                <div>Loại dự án</div>
                            </th>
                            <th>
                                <div>Thông tin dự án</div>
                            </th>
                            <th>
                                <div>Deadline dự án</div>
                            </th>
                            <th>
                                <div>File dự án</div>
                            </th>
                            <th>
                                <div>Ghi chú index</div>
                            </th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($project as $key => $val) {
                    $this_cusommer =  fn_get_row('name,username', ['id' => $val['customer_id']], 'users');
                    $text_deadline = ($val['deadline'] > 0) ? date('d/m/Y H:i', $val['deadline']) : '';
                    echo '
                   <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . project_id($val['id']) . '</td>
                                    <td>' . date('d/m/Y H:i', $val['created_at']) . '</td>
                                    <td>' . $this_cusommer['name'] . '</td>
                                    <td><a target="_blank" href="' . $val['website'] . '">' . $val['website'] . '</a></td>
                                    <td>' . $val['name_project_type'] . '</td>
                                    <td>' . nl2br($val['info']) . '</td>
                                    <td>' . $text_deadline . '</td>
                                    <td><a target="_blank" href="' . $val['file'] . '">' . $val['file'] . '</a></td>
                                    <td>' . nl2br($val['note_index']) . '</td>
                                </tr>
                   ';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function excel_jobs()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
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
                if ($this->input->get('ctv') > 0) {
                    $ctv = $this->input->get('ctv');
                    $where .= " AND ctv_jobs.ctv = $ctv";
                }
                if ($this->input->get('qa') > 0) {
                    $qa = $this->input->get('qa');
                    $where .= " AND ctv_jobs.qa_id = $qa";
                }
                if ($this->input->get('sqa') > 0) {
                    $sqa = $this->input->get('sqa');
                    $sqa = $sqa - 1;
                    if ($sqa == 4) {
                        $where .= " AND jobs.status_qa = 0";
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
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Danh_sach_cong_viec.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th rowspan="2">STT</th>
                            <th rowspan="2">
                                <div>Mã công việc</div>
                            </th>
                            <th rowspan="2">
                                <div>Thông tin công việc</div>
                            </th>
                            <th rowspan="2">
                                <div>Loại công việc</div>
                            </th>
                            <th rowspan="2">
                                <div>Người tạo</div>
                            </th>
                            <th rowspan="2">
                                <div>Thời gian tạo</div>
                            </th>
                            <th rowspan="2">
                                <div>Website</div>
                            </th>
                            <th rowspan="2">
                                <div>File công việc</div>
                            </th>
                            <th rowspan="2">
                                <div>Chi phí công việc</div>
                            </th>
                            <th rowspan="2">
                                <div>Phạt</div>
                            </th>
                            <th rowspan="2">
                                <div>Chi phí cuối</div>
                            </th>
                            <th colspan="6" class="th_col">CTV</th>
                            <th colspan="5" class="th_col">QA</th>
                            <th rowspan="2">
                                <div>Tiến độ công việc chung</div>
                            </th>
                            <th rowspan="2">
                                <div>Thời gian hoàn thành</div>
                            </th>
                            <th rowspan="2">
                                <div>Mức độ ưu tiên</div>
                            </th>
                            <th rowspan="2">
                                <div>Ghi chú QA</div>
                            </th>
                            <th rowspan="2">
                                <div>Ghi chú cho CTV</div>
                            </th>
                            <th rowspan="2">
                                <div>Ghi chú</div>
                            </th>
                        </tr>
                        <tr>
                            <th>CTV thực hiện</th>
                            <th>Deadline CTV</th>
                            <th>Tiến độ CTV</th>
                            <th>Thời gian triển khai</th>
                            <th>Thời gian hoàn thành</th>
                            <th>Xác nhận duyệt</th>
                            <th>QA thực hiện</th>
                            <th>Tiến độ QA</th>
                            <th>Thời gian duyệt</th>
                            <th>Đánh giá deadline</th>
                            <th>Đánh giá chất lượng</th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($jobs as $key => $val) {
                    if ($val['ctv'] !== null) {
                        $val['qa_name'] = ($val['qa_id'] > 0) ? get_name($val['qa_id']) : '--QA thực hiện--';
                        $val['content_qa_check'] = (!empty($val['content_qa_check'])) ? $val['content_qa_check'] : '--+--';
                    } else {
                        $val['ctv'] = 0;
                        $val['qa_id'] = 0;
                        $val['qa_name'] = '--QA thực hiện--';
                        $val['status_qa_check'] = 0;
                        $val['time_qa_check'] = 0;
                        $val['content_qa_check'] = '--Đánh giá--';
                        $val['deadline_ctv'] = 0;
                        $val['ctv_check_replly'] = 0;
                        $val['status_ctv'] = -1;
                        $val['time_ctv_job'] = 0;
                        $val['completion_ctv_job'] = 0;
                    }

                    $text_created_at = ($val['created_at'] > 0) ? date('d/m/Y H:i', $val['created_at']) : '';
                    $text_money = number_format($val['price'] - $val['punish']);
                    $text_ctv = ($val['ctv'] > 0) ? get_name($val['ctv']) : 'Chưa giao việc';
                    $text_deadline_ctv = ($val['deadline_ctv'] > 0) ? date('d/m/Y H:i', $val['deadline_ctv']) : '';
                    $text_time_ctv_job = ($val['time_ctv_job'] > 0) ? date('d/m/Y H:i', $val['time_ctv_job']) : 'Chưa cập nhật';
                    $text_completion_ctv_job = ($val['completion_ctv_job'] > 0) ? date('d/m/Y H:i', $val['completion_ctv_job']) : 'Chưa cập nhật';
                    $text_status_qa_check = ($val['status_qa'] == 1) ? status_qa_check($val['status_qa_check']) : "Không cần QA check";
                    $text_time_qa_check = ($val['status_qa'] == 1 && $val['time_qa_check'] > 0) ? date('d/m/Y H:i', $val['time_qa_check']) : "";
                    $ctv_jobs = fn_get_row('deadline,completion_time', ['job_id' => $val['id']], 'ctv_jobs');
                    $html_deadline = ($ctv_jobs != null) ? excess_time($ctv_jobs['deadline'], $ctv_jobs['completion_time']) : 'Chậm 0 ngày';
                    $text_content_qa_check = ($val['status_qa'] == 1) ? nl2br($val['content_qa_check']) : "";
                    $text_completion_time = ($val['completion_time'] > 0) ? date('d/m/Y H:i', $val['completion_time']) : '';
                    echo '
                   <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . $val['code'] . '</td>
                                    <td>' . nl2br($val['info']) . '</td>
                                    <td>' . $val['name_job_type'] . '</td>
                                    <td>' . $val['name_author'] . ' - ' . role($val['role_author']) . ' </td>
                                    <td>' . $text_created_at . '</td>
                                    <td><a target="_blank" href="' . $val['website'] . '">' . $val['website'] . '</a></td>
                                    <td><a target="_blank" href="' . $val['file_job'] . '">' . $val['file_job'] . '</a></td>
                                    <td>' . number_format($val['price']) . '</td>
                                    <td>' . number_format($val['punish']) . '</td>
                                    <td>' . $text_money . '</td>
                                    <td>' . $text_ctv . '</td>
                                    <td>' . $text_deadline_ctv . '</td>
                                    <td>' . status_ctv_job($val['status_ctv']) . '</td>
                                    <td>' . $text_time_ctv_job . '</td>
                                    <td>' . $text_completion_ctv_job . '</td>
                                    <td>' . ctv_check_status_qa($val['ctv_check_replly']) . '</td>
                                    <td>' . $val['qa_name'] . '</td>
                                    <td>' . $text_status_qa_check . '</td>
                                    <td>' . $text_time_qa_check . '</td>
                                    <td>' . $html_deadline . '</td>
                                    <td>' . $text_content_qa_check . '</td>
                                    <td>' . status_job($val['status']) . '</td>
                                    <td>' . $text_completion_time . '</td>
                                    <td>' . $val['z_index'] . '</td>
                                    <td>' . nl2br($val['note_qa']) . '</td>
                                    <td>' . nl2br($val['note_ctv']) . '</td>
                                    <td>' . nl2br($val['note']) . '</td>
                                </tr>
                   ';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function excel_collect_money()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
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
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Quan_ly_thu_tien.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th rowspan="2">STT</th>
                            <th rowspan="2">
                                <div>Mã dự án</div>
                            </th>
                            <th rowspan="2">
                                <div>ID giao dịch</div>
                            </th>
                            <th rowspan="2">
                                <div>Khách hàng</div>
                            </th>
                            <th rowspan="2">
                                <div>Thời gian tạo</div>
                            </th>
                            <th rowspan="2">
                                <div>Thời giao dịch</div>
                            </th>
                            <th rowspan="2">
                                <div>Hình thức thu tiền</div>
                            </th>
                            <th rowspan="2">
                                <div>Số tiền đã thu</div>
                            </th>
                            <th rowspan="2">
                                <div>Trạng thái giao dịch</div>
                            </th>
                            <th colspan="3" class="th_col">Thông tin nguồn nhận</th>
                            <th colspan="3" class="th_col">Thông tin bổ sung</th>
                        </tr>
                        <tr>
                            <th>Chủ tài khoản</th>
                            <th>STK/ID USDT</th>
                            <th>Tên ngân hàng/ USDT</th>
                            <th>Nội dung chuyển khoản</th>
                            <th>Minh chứng</th>
                            <th>Ghi chú</th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($collect_moneys as $key => $val) {
                    $html_bank_code = ($val['bank_code'] != '') ? $val['bank_code'] : 'Không có mã giao dịch';
                    $bank = fn_get_row('acronym', ['id' => $val['id_bank']], 'bank');
                    $html_img = ($val['bank_image'] != '') ? '<a href="' . base_url() . $val['bank_image'] . '" target="_blank" rel="noopener noreferrer" style="display: flex;gap:5px;justify-content: center;color: #2ec24f;" class="name_file">' . base_url() . $val['bank_image'] . '</a>' : '';
                    echo '
                   <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . project_id($val['project_id']) . '</td>
                                    <td>' . $html_bank_code . '</td>
                                    <td>' . $val['customer'] . '</td>
                                    <td>' . date('d/m/Y H:i', $val['created_at']) . '</td>
                                    <td>' . date('d/m/Y H:i', $val['bank_time']) . '</td>
                                    <td>' . bank_type($val['bank_type']) . '</td>
                                    <td>' . number_format($val['money']) . '</td>
                                    <td>' . bank_status($val['bank_status']) . '</td>
                                    <td>' . $val['name_input_source'] . '</td>
                                    <td>' . $val['stk'] . '</td>
                                    <td>' . $bank['acronym'] . '</td>
                                    <td>' . nl2br($val['bank_content']) . '</td>
                                    <td>' . $html_img . '</td>
                                    <td>' . nl2br($val['note']) . '</td>
                                </tr>
                   ';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function excel_project_type()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
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
                $project_types =  $this->Madmin->query_sql("SELECT project_type.*,users.name as name_author  FROM project_type JOIN users ON users.id=project_type.author WHERE delete_status = 0 $where ORDER BY project_type.id DESC");
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Loai_du_an.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th >STT</th>
                            <th>
                                <div>Tên loại dự án</div>
                            </th>
                            <th>
                                <div>Thời gian thêm</div>
                            </th>
                            <th>
                                <div>Người thêm</div>
                            </th>
                            <th>
                                <div>Doanh thu</div>
                            </th>
                            <th>
                                <div>Loại công việc</div>
                            </th>
                            <th>
                                <div>Index</div>
                            </th>
                            <th>
                                <div>Đầu việc cần index</div>
                            </th>
                            <th>
                                <div>File mẫu</div>
                            </th>
                            <th>
                                <div>Trạng thái</div>
                            </th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($project_types as $key => $val) {
                    $html_job_type = '';
                    foreach (explode(',', $val['job_type']) as $val1) {
                        $job_type = fn_get_row('name', ['id' => $val1], 'job_type');
                        $html_job_type .= '<p>' . $job_type['name'] . '</p>';
                    }
                    $html_data_index = '';
                    if ($val['status_index'] == 1 && $val['data_index'] != '') {
                        $data_index = json_decode($val['data_index']);
                        if ($data_index != null) {
                            foreach ($data_index as  $val_index) {
                                $this_index = fn_get_row('name', ['id' => $val_index->name], 'job_index');
                                $html_data_index .= '<p>' . $this_index['name'] . ': ' . $val_index->number . '%</p>';
                            }
                        }
                    }
                    $html_status = ($val['status'] == 1) ? 'Đang hoạt động' : 'Tạm dừng hoạt động';
                    $html_index = ($val['status_index'] == 1) ? 'Có' : "Không";

                    echo '
                        <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . $val['name'] . '</td>
                                    <td>' . date('d/m/Y H:i', $val['created_at']) . '</td>
                                    <td>' . $val['name_author'] . '</td>
                                    <td>' . number_format($val['price']) . 'đ</td>
                                    <td>' . $html_job_type . '</td>
                                    <td>' . $html_index . '</td>
                                    <td>' . $html_data_index . '</td>
                                    <td><a target="_blank" href="' . $val['file_ex'] . '">' . $val['file_ex'] . '</a></td>
                                    <td>' . $html_status . '</td>
                                </tr>
                   ';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function excel_job_type()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
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
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Loai_cong_viec.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th >STT</th>
                            <th >
                                <div>Tên loại công việc</div>
                            </th>
                            <th >
                                <div>Thời gian thêm</div>
                            </th>
                            <th >
                                <div>Người thêm</div>
                            </th>
                            <th >
                                <div>Chi phí công việc</div>
                            </th>
                            <th >
                                <div>Thông tin công việc</div>
                            </th>
                            <th >
                                <div>Index</div>
                            </th>
                            <th >
                                <div>Trạng thái</div>
                            </th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($job_types as $key => $val) {
                    $html_status = ($val['status'] == 1) ? 'Đang hoạt động' : 'Tạm dừng hoạt động';
                    $html_index = ($val['status_index'] == 1) ? 'Có' : "Không";
                    echo '
                        <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . $val['name'] . '</td>
                                    <td>' . date('d/m/Y H:i', $val['created_at']) . '</td>
                                    <td>' . $val['name_author'] . '</td>
                                    <td>' . number_format($val['price']) . '</td>
                                    <td>' . nl2br($val['info']) . '</td>
                                    <td>' . $html_index . '</td>
                                    <td>' . $html_status . '</td>
                                </tr>
                   ';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function excel_unit_price()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
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
                $unit_price = $this->Madmin->query_sql("SELECT unit_price.*,users.name as name_author FROM unit_price JOIN users ON users.id=unit_price.author_id JOIN project_type ON project_type.id=unit_price.project_type WHERE unit_price.delete_status = 0 AND $where ");
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Don_gia.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th >STT</th>
                            <th>
                                <div>Loại dự án</div>
                            </th>
                            <th>
                                <div>Khách hàng</div>
                            </th>
                            <th>
                                <div>Giá gốc</div>
                            </th>
                            <th>
                                <div>Doanh thu</div>
                            </th>
                            <th>
                                <div>Thời gian thêm</div>
                            </th>
                            <th>
                                <div>Người thêm</div>
                            </th>
                            <th>
                                <div>Trạng thái</div>
                            </th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($unit_price as $key => $val) {
                    $html_status = ($val['status'] == 1) ? 'Đang hoạt động' : 'Tạm dừng hoạt động';
                    echo '
                        <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . $val['project_type_name'] . '</td>
                                    <td>' . get_name($val['customer_id']) . '</td>
                                    <td>' . number_format($val['price']) . 'đ</td>
                                    <td>' . number_format($val['revenue']) . 'đ</td>
                                    <td>' . date('d/m/Y H:i', $val['created_at']) . '</td>
                                    <td>' . $val['name_author'] . '</td>
                                    <td>' . $html_status . '</td>
                                </tr>
                   ';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function excel_input_source()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
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
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Thong_tin_nguon_nhan.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th rowspan="2">STT</th>
                            <th colspan="3">
                                <div>Thông tin nguồn nhận</div>
                            </th>
                            <th rowspan="2">
                                <div>Thời gian thêm</div>
                            </th>
                            <th rowspan="2">
                                <div>Người thêm</div>
                            </th>
                            <th rowspan="2">
                                <div>Trạng thái</div>
                            </th>
                        </tr>
                        <tr>
                            <th>Chủ tài khoản</th>
                            <th>STK/ID USDT</th>
                            <th>Tên ngân hàng/USDT</th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($input_sources as $key => $val) {
                    $html_status = ($val['status'] == 1) ? 'Đang hoạt động' : 'Tạm dừng hoạt động';
                    echo '
                        <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . $val['name'] . '</td>
                                    <td>' . $val['stk'] . '</td>
                                    <td>' . $val['name_bank'] . '</td>
                                    <td>' . date('d/m/Y H:i', $val['created_at']) . '</td>
                                    <td>' . $val['name_author'] . '</td>
                                    <td>' . $html_status . '</td>
                                </tr>
                   ';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function excel_job_index()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
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
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Dau_viec_can_index.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th>STT</th>
                            <th>
                                <div>Tên đầu việc</div>
                            </th>
                            <th>
                                <div>Thời gian thêm</div>
                            </th>
                            <th>
                                <div>Người thêm</div>
                            </th>
                            <th>
                                <div>Trạng thái</div>
                            </th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($job_indexs as $key => $val) {
                    $html_status = ($val['status'] == 1) ? 'Đang hoạt động' : 'Tạm dừng hoạt động';
                    echo '
                        <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . $val['name'] . '</td>
                                    <td>' . date('d/m/Y H:i', $val['created_at']) . '</td>
                                    <td>' . $val['name_author'] . '</td>
                                    <td>' . $html_status . '</td>
                                </tr>
                   ';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function excel_accounts()
    {
        if (admin()) {
            if (check_role() == 1 || check_role() == 2) {
                $where = " delete_user = 0 ";
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
                $list_user = $this->Madmin->query_sql("SELECT * FROM users WHERE $where ORDER BY id DESC");
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Danh_sach_tai_khoan.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th>STT</th>
                            <th>
                                <div>Tài khoản đăng nhập</div>
                            </th>
                            <th>
                                <div>Họ và tên</div>
                            </th>
                            <th>
                                <div>Email</div>
                            </th>
                            <th>
                                <div>Sô điện thoại</div>
                            </th>
                            <th>
                                <div>Vai trò</div>
                            </th>
                            <th>
                                <div>Thời gian tạo</div>
                            </th>
                            <th>
                                <div>Trạng thái</div>
                            </th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($list_user as $key => $val) {
                    $html_status = ($val['status'] == 1) ? 'Đang hoạt động' : 'Tạm dừng hoạt động';
                    echo '
                        <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . $val['username'] . '</td>
                                    <td>' . $val['name'] . '</td>
                                    <td>' . $val['email'] . '</td>
                                    <td>' . $val['phone'] . '</td>
                                    <td>' . role($val['role']) . '</td>
                                    <td>' . date('d/m/Y H:i', $val['created_at']) . '</td>
                                    <td>' . $html_status . '</td>
                                </tr>
                   ';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function excel_qa()
    {
        if (admin()) {
            if (check_role() == 4) {
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
                        $where .= " AND jobs.status_index = 1 AND projects.check_index <= 0 AND projects.check_index >= 4";
                    } elseif ($sin == 3) {
                        $where .= " AND jobs.status_index = 0";
                    }
                }
                $jobs_limit = $this->Madmin->query_sql("SELECT jobs.*,website,file,users.name as name_author,users.role as author_role,check_index,projects.delete_status as del_project,projects.status as status_project,
                ctv_jobs.id as ctv_job_id,ctv_jobs.ctv as ctv_job_ctv,ctv_jobs.deadline as ctv_job_deadline,ctv_jobs.completion_time as ctv_job_completion_time,ctv_jobs.content_qa_check as ctv_job_content_qa_check,ctv_jobs.status_qa_check as ctv_job_status_qa_check,ctv_jobs.time_qa_check as ctv_job_time_qa_check,ctv_jobs.file_qa_check as ctv_job_file_qa_check,ctv_jobs.check_replly as ctv_job_check_replly,ctv_jobs.status as ctv_job_status
                FROM jobs
                LEFT JOIN users ON users.id = jobs.author 
                LEFT JOIN projects ON projects.id = jobs.project_id 
                LEFT JOIN ctv_jobs ON ctv_jobs.job_id = jobs.id 
                WHERE jobs.status_qa = 1 $where ORDER BY CASE WHEN jobs.status = 3 THEN 1 ELSE 0 END, jobs.status ASC ");
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Cong_viec_QA.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th rowspan="2">STT</th>
                                <th rowspan="2">
                                    <div>Mã dự án</div>
                                </th>
                                <th rowspan="2">
                                    <div>Loại công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thông tin công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>Website</div>
                                </th>
                                <th rowspan="2">
                                    <div>Người tạo</div>
                                </th>
                                <th rowspan="2">
                                    <div>CTV thực hiện</div>
                                </th>
                                <th rowspan="2">
                                    <div>Deadline CTV</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thời gian CTV gửi</div>
                                </th>
                                <th rowspan="2">
                                    <div>File công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>File QA check</div>
                                </th>
                                <th colspan="2" class="th_col">Đánh giá công việc</th>
                                <th rowspan="2">
                                    <div>Phạt</div>
                                </th>
                                <th rowspan="2">
                                    <div>Trạng thái công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thời gian cập nhật</div>
                                </th>
                                <th rowspan="2">
                                    <div>Trạng thái xác nhận</div>
                                </th>
                                <th rowspan="2">
                                    <div>Index</div>
                                </th>
                            </tr>
                            <tr>
                                <th>Deadline</th>
                                <th>Chất lượng</th>
                            </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($jobs_limit as $key => $val) {
                    $job_type = fn_get_row('name', ['id' => $val['job_type']], 'job_type');
                    $html_ctv = ($val['ctv_job_id'] > 0) ? get_name($val['ctv_job_ctv']) : '';
                    $html_deadline = ($val['ctv_job_id'] > 0 && $val['ctv_job_deadline'] > 0) ? date('d/m/Y H:i', $val['ctv_job_deadline']) : '';
                    $html_completion_time = ($val['ctv_job_id'] > 0) ? date('d/m/Y H:i', $val['ctv_job_completion_time']) : '';
                    $html_excess =  ($val['ctv_job_id'] > 0) ? excess_time($val['ctv_job_deadline'], $val['ctv_job_completion_time'])  : 'Chậm 0 ngày';
                    if ($val['status'] == 3) {
                        $html_stt = "Đã hủy";
                    } else if ($val['ctv_job_id'] > 0) {
                        $html_stt = status_qa_check($val['ctv_job_status_qa_check']);
                    } else {
                        $html_stt = "--Trạng thái công việc--";
                    }
                    $htmml_qa_check = ($val['ctv_job_id'] > 0) ? date('d/m/Y H:i', $val['ctv_job_time_qa_check']) : '';
                    $html_check_replly = ($val['ctv_job_id'] > 0) ? ctv_check_status_qa($val['ctv_job_check_replly']) : '';
                    if ($val['status_index'] == 1 && $val['check_index'] > 0 && $val['check_index'] < 4) {
                        $html_index = "Đã chuyển index";
                    } elseif ($val['status_index'] == 0) {
                        $html_index = "Không duyệt index";
                    } elseif ($val['status_index'] == 1) {
                        $html_index =  'Có duyệt index';
                    }

                    echo '
                   <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . $val['code'] . '</td>
                                    <td>' . $job_type['name'] . '</td>
                                    <td>' . nl2br($val['info']) . '</td>
                                    <td><a target="_blank" href="' . $val['website'] . '">' . $val['website'] . '</a></td>
                                    <td>' . $val['name_author'] . ' - ' . role($val['author_role']) . '</td>
                                    <td>' . $html_ctv . '</td>
                                    <td>' . $html_deadline . '</td>
                                    <td>' . $html_completion_time . '</td>
                                    <td><a target="_blank" href="' . $val['file_job'] . '">' . $val['file_job'] . '</a></td>
                                    <td><a target="_blank" href="' . $val['file_qa_check'] . '">' . $val['file_qa_check'] . '</a></td>
                                    <td>' . $html_excess . '</td>
                                    <td>' . nl2br($val['content_qa_check']) . '</td>
                                    <td>' . number_format($val['punish']) . ' đ</td>
                                    <td>' . $html_stt . '</td>
                                    <td>' . $htmml_qa_check . '</td>
                                    <td>' . $html_check_replly . '</td>
                                    <td>' . $html_index . '</td>
                                </tr>
                   ';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function excel_ctv_jobs()
    {
        if (admin()) {
            if (check_role() == 5) {
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
                $ctv_jobs = $this->Madmin->query_sql("SELECT ctv_jobs.*,code,file_job,website,file,job_type,note_ctv,jobs.price,punish,jobs.info as job_info, job_type.name as name_job_type FROM ctv_jobs 
                JOIN projects On projects.id = ctv_jobs.project_id 
                JOIN jobs On jobs.id = ctv_jobs.job_id 
                JOIN job_type On job_type.id = jobs.job_type 
                WHERE ctv_jobs.ctv= $id $where ORDER BY jobs.z_index DESC,ctv_jobs.created_at");
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Cong_viec_ctv.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th rowspan="3">STT</th>
                            <th rowspan="3">
                                <div>Mã công việc</div>
                            </th>
                            <th rowspan="3">
                                <div>Website</div>
                            </th>
                            <th rowspan="3">
                                <div>Loại công việc</div>
                            </th>
                            <th rowspan="3">
                                <div>Thông tin công việc</div>
                            </th>
                            <th rowspan="3">
                                <div>File công việc</div>
                            </th>
                            <th rowspan="3">
                                <div>Thời gian nhận việc</div>
                            </th>
                            <th rowspan="3">
                                <div>Deadline CTV</div>
                            </th>
                            <th rowspan="3">
                                <div>Thời gian hoàn thành</div>
                            </th>
                            <th rowspan="3">
                                <div>Lương nhận</div>
                            </th>
                            <th rowspan="3">
                                <div>Phạt(i)</div>
                            </th>
                            <th rowspan="3">
                                <div>Lương thực nhận</div>
                            </th>
                            <th rowspan="3" class="th_col">
                                <div>Trạng thái công việc</div>
                            </th>
                            <th colspan="5" class="th_col">QA duyệt</th>
                            <th rowspan="3">
                                <div>Xác nhận duyệt</div>
                            </th>
                            <th rowspan="3">
                                <div>Ghi chú công việc</div>
                            </th>
                        </tr>
                        <tr>
                            <th rowspan="2">
                                <div>Trạng thái duyệt QA</div>
                            </th>
                            <th rowspan="2">
                                <div>Thời gian duyệt</div>
                            </th>
                            <th colspan="3" class="th_col">Đánh giá công việc</th>
                        </tr>
                        <tr>
                            <th>Deadline</th>
                            <th>Chất lượng</th>
                            <th>File QA duyệt</th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($ctv_jobs as $key => $val) {
                    $job_type = fn_get_row('name', ['id' => $val['job_type']], 'job_type');
                    $html_status_qa_check = ($val['status_qa_check'] > 0 && $val['time_qa_check'] > 0) ? date('d/m/Y H:i', $val['time_qa_check']) : '--Thời gian--';
                    $html_content_qa_check = ($val['content_qa_check'] != '') ? $val['content_qa_check'] : '';
                    echo '
                   <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . $val['code'] . '</td>
                                    <td><a target="_blank" href="' . $val['website'] . '">' . $val['website'] . '</a></td>
                                    <td>' . $job_type['name'] . '</td>
                                    <td>' . nl2br($val['job_info']) . '</td>
                                    <td><a target="_blank" href="' . $val['file_job'] . '">' . $val['file_job'] . '</a></td>
                                    <td>' . date('d/m/Y H:i', $val['created_at']) . '</td>
                                    <td>' . date('d/m/Y H:i', $val['deadline']) . '</td>
                                    <td>' . date('d/m/Y H:i', $val['completion_time']) . '</td>
                                    <td>' . number_format($val['price']) . '</td>
                                    <td>' . number_format($val['punish']) . '</td>
                                    <td>' . number_format($val['price'] - $val['punish']) . '</td>
                                    <td>' . status_ctv_job($val['status'])  . '</td>
                                    <td>' . status_qa_check($val['status_qa_check']) . '</td>
                                    <td>' . $html_status_qa_check  . '</td>
                                    <td>' . excess_time($val['deadline'], $val['completion_time']) . '</td>
                                    <td>' . $html_content_qa_check . '</td>
                                    <td><a target="_blank" href="' . $val['file_qa_check'] . '">' . $val['file_qa_check'] . '</a></td>
                                    <td>' . ctv_check_status_qa($val['check_replly']) . '</td>
                                    <td>' . nl2br($val['note_ctv']) . '</td>
                                </tr>
                   ';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function excel_jobs_index()
    {
        if (admin()) {
            if (check_role() == 3) {
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
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Cong_viec_Index.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th rowspan="2">STT</th>
                            <th rowspan="2">
                                <div>Mã dự án</div>
                            </th>
                            <th rowspan="2">
                                <div>Deadline dự án</div>
                            </th>
                            <th rowspan="2">
                                <div>Website dự án</div>
                            </th>
                            <th rowspan="2">
                                <div>File dự án</div>
                            </th>
                            <th rowspan="2">
                                <div>Thông tin dự án</div>
                            <th colspan="3" class="th_col">Index</th>
                            </th>
                            <th rowspan="2">
                                <div>Tỉ lệ index thực tế</div>
                            </th>
                            <th rowspan="2">
                                <div>Tỉ lệ index mong muốn</div>
                            </th>
                            <th rowspan="2">
                                <div>Người duyệt index</div>
                            </th>
                            <th rowspan="2">
                                <div>Ghi chú</div>
                            </th>
                        </tr>
                        <tr>
                            <th>Trạng thái công việc</th>
                            <th>Thời gian cập nhật</th>
                            <th>Thời gian cập nhật tiếp theo</th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($project as $key => $val) {
                    if ($val['status'] == 3) {
                        $html_check_index = "Đã hủy";
                    } else {
                        $html_check_index = project_status_index($val['check_index']);
                    }
                    $html_time_index = ($val['time_index'] != '') ? date('d/m/Y H:i', $val['time_index']) : '--+--';
                    $html_time_index_next = ($val['time_index_next'] > 0) ? date('d/m/Y H:i', $val['time_index_next']) : '--+--';

                    $html_data_index_real = '';
                    if ($val['status_index'] == 1 && $val['data_index_real'] != '') {
                        $data_index_real = json_decode($val['data_index_real']);
                        foreach ($data_index_real as  $val_index) {
                            $this_index = fn_get_row('name', ['id' => $val_index->name], 'job_index');
                            $html_data_index_real .= '<p>' . $this_index['name'] . ': ' . $val_index->number . '%</p>';
                        }
                    }
                    $html_data_index = '';
                    if ($val['status_index'] == 1 && $val['data_index'] != '') {
                        $data_index = json_decode($val['data_index']);
                        if ($data_index != null) {
                            foreach ($data_index as  $val_index) {
                                $this_index = fn_get_row('name', ['id' => $val_index->name], 'job_index');
                                $html_data_index .= '<p>' . $this_index['name'] . ': ' . $val_index->number . '%</p>';
                            }
                        }
                    }
                    $html_user_check_index = '';
                    if ($val['user_check_index'] != '') {
                        $user_check_index = explode(',', $val['user_check_index']);
                        foreach ($user_check_index as  $val_user) {
                            $html_user_check_index .= '<p>' . get_name($val_user) . '</p>';
                        }
                    } else {
                        $html_user_check_index =  "--+--";
                    }
                    echo '
                   <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . project_id($val['id']) . '</td>
                                    <td>' . date('d/m/Y H:i', $val['deadline']) . '</td>
                                    <td><a target="_blank" href="' . $val['website'] . '">' . $val['website'] . '</a></td>
                                    <td><a target="_blank" href="' . $val['file'] . '">' . $val['file'] . '</a></td>
                                    <td>' . nl2br($val['info']) . '</td>
                                    <td>' . $html_check_index . '</td>
                                    <td>' . $html_time_index . '</td>
                                    <td>' . $html_time_index_next . '</td>
                                    <td>' . $html_data_index_real . '</td>
                                    <td>' . $html_data_index . '</td>
                                    <td>' . $html_user_check_index . '</td>
                                    <td>' . nl2br($val['note_index']) . '</td>
                                </tr>
                   ';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function excel_customer()
    {
        if (admin()) {
            if (check_role() == 7) {
                $id = $_SESSION['user']['id'];
                $where = "customer_id = $id ";
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
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=Du_an_khach_hang.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                echo '<table border="1px solid black">';
                echo '<thead>
                        <tr>
                            <th rowspan="2">STT</th>
                            <th rowspan="2">
                                <div>Mã dự án</div>
                            </th>
                            <th rowspan="2">
                                <div>Loại dự án</div>
                            </th>
                            <th colspan="5" class="th_col">Trạng thái triển khai</th>
                            <th rowspan="2">
                                <div>Giá gốc</div>
                            </th>
                            <th rowspan="2">
                                <div>Số tiền cần thanh toán( đã bao gồm chiết khấu)</div>
                            </th>
                            <th rowspan="2">
                                <div>Đã thanh toán</div>
                            </th>
                            <th rowspan="2">
                                <div>Công nợ</div>
                            </th>
                            <th rowspan="2">
                                <div>Trạng thái công nợ</div>
                            </th>
                            <th rowspan="2">
                                <div>Trạng thái bàn giao</div>
                            </th>
                        </tr>
                        <tr>
                            <th  class="col_color">Tiến độ dự án</th>
                            <th  class="col_color">Thời gian bắt đầu triển khai</th>
                            <th  class="col_color">Thời gian hoàn thành</th>
                            <th  class="col_color">Thời gian tạm dừng</th>
                            <th  class="col_color">Thời gian hủy dự án</th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                foreach ($project as $key => $val) {
                    $html_time_start = ($val['time_start']  > 0) ? date('d/m/Y H:i', $val['time_start']) : '--+--';
                    $html_time_end = ($val['time_end']  > 0) ? date('d/m/Y H:i', $val['time_end']) : '--+--';
                    $html_time_pause = ($val['time_pause']  > 0) ? date('d/m/Y H:i', $val['time_pause']) : '--+--';
                    $html_time_cancel = ($val['time_cancel']  > 0) ? date('d/m/Y H:i', $val['time_cancel']) : '--+--';
                    $money = fn_get_row('SUM(money) as money_sum', ['project_id' => $val['id'], 'bank_status' => 1, 'delete_status' => 0], 'collect_money');
                    $html_money = (number_format($val['revenue'] - $money['money_sum']) > 0) ? number_format($val['revenue'] - $money['money_sum']) : 0;
                    echo '
                   <tr>
                                    <td>' . ++$key . '</td>
                                    <td>' . project_id($val['id']) . '</td>
                                    <td>' . $val['name_project_type'] . '</td>
                                    <td>' . status_project($val['status']) . '</td>
                                    <td>' . $html_time_start . '</td>
                                    <td>' . $html_time_end . '</td>
                                    <td>' . $html_time_pause . '</td>
                                    <td>' . $html_time_cancel . '</td>
                                    <td>' . number_format($val['price_project_type']) . ' đ</td>
                                    <td>' . number_format($val['revenue']) . ' đ</td>
                                    <td>' . number_format($money['money_sum']) . '</td>
                                    <td >' . $html_money . '</td>
                                    <td>' . debt_status($val['debt_status']) . '</td>
                                    <td>' . handover_status($val['handover_status']) . '</td>
                                </tr>
                   ';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
        } else {
            redirect('/dang-nhap/');
        }
    }
}
