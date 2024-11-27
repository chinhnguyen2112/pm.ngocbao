<?php

function pagination($base_url, $total_row, $per_page, $segment = '')
{
	$CI = &get_instance();
	$CI->load->library("pagination");
	$config['base_url'] = $base_url;
	$config['total_rows'] = $total_row;
	$config['per_page'] = $per_page;
	$config["use_page_numbers"] = true;
	$config["reuse_query_string"] = true;
	$config["prefix"] = '/';
	if ($segment > 0) {
		$config['uri_segment'] = 3;
	}
	// full tag pagination
	$config["full_tag_open"] = " <nav class='list_pagination' >
        <ul class='pagination'>";
	$config["full_tag_close"] = "</ul>
        </nav>";
	// first link
	$config["first_link"] = "&lt&lt";
	$config["first_tag_open"] = "<li class='page-item update-page-item'>";
	$config["first_tag_close"] = "</li>";

	// last link
	$config["last_link"] = "&gt&gt";
	$config["last_tag_open"] = "<li class='page-item update-page-item'>";
	$config["last_tag_close"] = "</li>";

	// next link
	$config["next_link"] = "&gt";
	$config["next_tag_open"] = "<li class='page-item update-page-item'>";
	$config["next_tag_close"] = "</li>";

	// pre link
	$config["prev_link"] = "&lt";
	$config["prev_tag_open"] = "<li class='page-item update-page-item'>";
	$config["prev_tag_close"] = "</li>";

	// cur link 
	$config["cur_tag_open"] = "<li class='page-item update-page-item active_pagin'><a class='page-link'>";
	$config["cur_tag_close"] = "</a></li>";
	$config['num_links'] = 1;

	$config["num_tag_open"] = "<li class='page-item update-page-item'>";
	$config["num_tag_close"] = "</li>";
	$config['attributes'] = array('class' => 'page-link');
	$CI->pagination->initialize($config);
}
function admin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['id'] > 0 && $_SESSION['user']['delete_user'] == 0) {
		return true;
	} else {
		return false;
	}
}
function check_admin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['id'] > 0 && $_SESSION['user']['delete_user'] == 0 && $_SESSION['user']['role'] == 1) {
		return 1; // admin
	} else if (isset($_SESSION['user']) && $_SESSION['user']['id'] > 0 && $_SESSION['user']['delete_user'] == 0 && $_SESSION['user']['role'] == 2) {
		return 2; // PM
	} else if (isset($_SESSION['user']) && $_SESSION['user']['id'] > 0 && $_SESSION['user']['delete_user'] == 0 && $_SESSION['user']['role'] == 3) {
		return 3; // Index
	} else if (isset($_SESSION['user']) && $_SESSION['user']['id'] > 0 && $_SESSION['user']['delete_user'] == 0 && $_SESSION['user']['role'] == 4) {
		return 4; // QA
	} else if (isset($_SESSION['user']) && $_SESSION['user']['id'] > 0 && $_SESSION['user']['delete_user'] == 0 && $_SESSION['user']['role'] == 5) {
		return 5; // CTV
	} else if (isset($_SESSION['user']) && $_SESSION['user']['id'] > 0 && $_SESSION['user']['delete_user'] == 0 && $_SESSION['user']['role'] == 6) {
		return 6; // CTV
	}else if (isset($_SESSION['user']) && $_SESSION['user']['id'] > 0 && $_SESSION['user']['delete_user'] == 0 && $_SESSION['user']['role'] == 7) {
		return 7; // khách hàng
	}
}
function replaceTitles($title)
{
	$title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');
	$title  = remove_accent($title);
	$title = str_replace('/', '', $title);
	$title = preg_replace('/[^\00-\255]+/u', '', $title);

	if (preg_match("/[\p{Han}]/simu", $title)) {
		$title = str_replace(' ', '-', $title);
	} else {
		$arr_str  = array("&lt;", "&gt;", "/", " / ", "\\", "&apos;", "&quot;", "&amp;", "lt;", "gt;", "apos;", "quot;", "amp;", "&lt", "&gt", "&apos", "&quot", "&amp", "&#34;", "&#39;", "&#38;", "&#60;", "&#62;");

		$title  = str_replace($arr_str, " ", $title);
		$title  = preg_replace('/\p{P}|\p{S}/u', ' ', $title);
		$title = preg_replace('/[^0-9a-zA-Z\s]+/', ' ', $title);

		//Remove double space
		$array = array(
			'    ' => ' ',
			'   ' => ' ',
			'  ' => ' ',
		);
		$title = trim(strtr($title, $array));
		$title  = str_replace(" ", "-", $title);
		$title  = urlencode($title);
		// remove cac ky tu dac biet sau khi urlencode
		$array_apter = array("%0D%0A", "%", "&");
		$title  = str_replace($array_apter, "-", $title);
		$title  = strtolower($title);
	}
	return $title;
}
function remove_accent($mystring)
{
	$marTViet = array(
		"à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ","ì","í","ị","ỉ","ĩ","ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ","ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ","ỳ","ý","ỵ","ỷ","ỹ","đ","À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ","È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ","Ì","Í","Ị","Ỉ","Ĩ","Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ","Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ","Ỳ","Ý","Ỵ","Ỷ","Ỹ","Đ","'"
	);

	$marKoDau = array("a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","e","e","e","e","e","e","e","e","e","e","e","i","i","i","i","i","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","u","u","u","u","u","u","u","u","u","u","u","y","y","y","y","y","d","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","E","E","E","E","E","E","E","E","E","E","E","I","I","I","I","I","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","U","U","U","U","U","U","U","U","U","U","U","Y","Y","Y","Y","Y","D",""
	);

	return str_replace($marTViet, $marKoDau, $mystring);
}
function role($id)
{
	switch ($id) {
		case 1:
			$role = 'Admin';
			break;
		case 2:
			$role = 'PM';
			break;
		case 3:
			$role = 'Index';
			break;
		case 4:
			$role = 'QA';
			break;
		case 5:
			$role = 'CTV';
			break;
		case 6:
			$role = 'Marketing';
			break;
			case 7:
				$role = 'Khách hàng';
				break;
		default:
			$role = 'Chưa cập nhật';
			break;
	}
	return $role;
}
function check_role()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['id'] > 0 && $_SESSION['user']['delete_user'] == 0) {
		return $_SESSION['user']['role']; // user
	} else {
		return 0;
	}
}
function get_id()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['delete_user'] == 0 && $_SESSION['user']['id'] > 0) {
		return $_SESSION['user']['id']; // user
	} else {
		return 0;
	}
}
function format_id($id)
{
	if ($id > 999999) {
		return $id;
	} else {
		return sprintf('%06d', $id);
	}
}
function project_id($id)
{
	return format_id($id);
}
function format_id_job($id)
{
	if ($id > 9) {
		return $id;
	} else {
		return sprintf('%02d', $id);
	}
}
function job_id($id)
{
	return format_id_job($id);
}
function status_ctv_job($id)
{
	switch ($id) {
		case -1:
			$status = 'Chưa cập nhật';
			break;
		case 1:
			$status = 'Hoàn thành';
			break;
		case 2:
			$status = 'Hoàn thành'; // hoàn thành xong sẽ xóa
			break;
		case 3:
			$status = 'Đã hủy'; // Xóa
			break;
		default:
			$status = 'Đang triển khai';
			break;
	}
	return $status;
}

function array_status_ctv_job()
{
	$array = [
		[
			'status' => 0,
			'name' => 'Đang triển khai'
		],
		[
			'status' => 1,
			'name' => 'Hoàn thành'
		],
	];
	return $array;
}
function ctv_check_status_qa($id)
{
	switch ($id) {
		case 1:
			$status = 'Đang review';
			break;
		case 2:
			$status = 'Đồng ý duyệt';
			break;
		case 3:
			$status = 'Không đồng ý duyệt';
			break;
		default:
			$status = 'Xác nhận duyệt';
			break;
	}
	return $status;
}
function array_ctv_check_status_qa()
{
	$array = [
		[
			'status' => 2,
			'name' => 'Đồng ý duyệt'
		],
		[
			'status' => 3,
			'name' => 'Không đồng ý duyệt'
		],
	];
	return $array;
}
function status_job($id)
{
	switch ($id) {
		case 1:
			$status = 'Hoàn thành';
			break;
		case 3:
			$status = 'Đã hủy';
			break;
		default:
			$status = 'Đang triển khai';
			break;
	}
	return $status;
}

function debt_status($id)
{
	switch ($id) {
		case 1:
			$status = 'Đã tất toán';
			break;
		case 2:
			$status = 'Khả năng tất toán thấp';
			break;
		default:
			$status = 'Chưa tất toán';
			break;
	}
	return $status;
}
function array_debt_status()
{
	$array = [
		[
			'status' => 1,
			'name' => 'Đã tất toán'
		],
		[
			'status' => 2,
			'name' => 'Khả năng tất toán thấp'
		],
	];
	return $array;
}
function status_project($id)
{
	switch ($id) {
		case 1:
			$status = 'Hoàn thành';
			break;
		case 2:
			$status = 'Bắt đầu triển khai';
			break;
		case 3:
			$status = 'Đã hủy';
			break;
		default:
			$status = 'Đang chốt thông tin';
			break;
	}
	return $status;
}
function array_status_project()
{
	$array = [
		[
			'status' => 0,
			'name' => 'Đang chốt thông tin'
		],
		[
			'status' => 1,
			'name' => 'Hoàn thành'
		],
		[
			'status' => 2,
			'name' => 'Bắt đầu triển khai'
		],
		[
			'status' => 3,
			'name' => 'Đã hủy'
		],
	];
	return $array;
}
function handover_status($id)
{
	switch ($id) {
		case 1:
			$status = 'Đã bàn giao lần 1';
			break;
		case 2:
			$status = 'Đã bàn giao lần 2';
			break;
		case 3:
			$status = 'Đã bàn giao lần 3';
			break;
		default:
			$status = 'Chưa bàn giao';
			break;
	}
	return $status;
}
function array_handover_status()
{
	$array = [
		[
			'status' => 1,
			'name' => 'Đã bàn giao lần 1'
		],
		[
			'status' => 2,
			'name' => 'Đã bàn giao lần 2'
		],
		[
			'status' => 3,
			'name' => 'Đã bàn giao lần 3'
		],
	];
	return $array;
}

function project_division($ctv, $job)
{
	if ($job == 0 || $ctv == 0) {
		$status = 'Chưa phân dự án';
	} else {
		$status = 'Đã phân dư án (' . $ctv . '/' . $job . ')';
	}
	return $status;
}

function project_progress($num, $full)
{
	if ($num == 0 || $full == 0) {
		$status = 'Chưa phân dự án';
	} else {
		$status = 'Đã phân dư án (' . $num . '/' . $num . ')';
	}
	return $status;
}


function project_status_index($id)
{
	switch ($id) {
		case 1:
			$status = 'Hoàn thành';
			break;
		case 2:
			$status = 'Chưa hoàn thành';
			break;
		case 3:
			$status = 'Có thể check';
			break;
		case 4:
			$status = 'Chưa cần check';
			break;
		default:
			$status = 'Không cần check index';
			break;
	}
	return $status;
}
function array_project_status_index()
{
	$array = [
		[
			'status' => 1,
			'name' => 'Hoàn thành'
		],
		// [
		// 	'status' => 2,
		// 	'name' => 'Chưa hoàn thành'
		// ],
	];
	return $array;
}
function get_name($id)
{
	$CI = &get_instance();
	$CI->load->database();

	$CI->db->select('name');
	$CI->db->where(['id' => $id]);
	$array = $CI->db->get('users')->row_array();
	return $array['name'];
}

function get_role($id)
{
	$CI = &get_instance();
	$CI->load->database();

	$CI->db->select('role');
	$CI->db->where(['id' => $id]);
	$array = $CI->db->get('users')->row_array();
	return $array['role'];
}
function bank_type($id)
{
	switch ($id) {
		case 1:
			$status = 'Thanh toán ngân hàng';
			break;
		default:
			$status = 'Thanh toán USDT';
			break;
	}
	return $status;
}

function bank_status($id)
{
	switch ($id) {
		case 1:
			$status = 'Thành công';
			break;
		case 2:
			$status = 'Cần xác thực';
			break;
		default:
			$status = 'Không thành công';
			break;
	}
	return $status;
}
function array_bank_status()
{
	$array = [
		[
			'status' => 1,
			'name' => 'Thành công'
		],
		[
			'status' => 0,
			'name' => 'Không thành công'
		],
	];
	return $array;
}
function fn_get_row($select, $where, $table)
{
	$CI = &get_instance();
	$CI->load->database();

	$CI->db->select($select);
	$CI->db->where($where);
	$array = $CI->db->get($table)->row_array();
	return $array;
}

function fn_get_num($where, $table)
{
	$CI = &get_instance();
	$CI->load->database();

	$CI->db->where($where);
	$array = $CI->db->get($table)->num_rows();
	return $array;
}
function fn_get_list($select, $where, $table)
{
	$CI = &get_instance();
	$CI->load->database();

	$CI->db->select($select);
	$CI->db->where($where);
	$array = $CI->db->get($table)->result_array();
	return $array;
}
function ctv_success($ctv, $job)
{
	if ($job == 0) {
		$status = 'Chưa phân dự án';
	} elseif ($job == $ctv) {
		$status = 'Hoàn thành';
	} else {
		$status = 'Đang triển khai (' . $ctv . '/' . $job . ')';
	}
	return $status;
}
function  excess_time($start, $end)
{
	if ($end == '' || $end == 0) {
		$end = time();
	}
	$time = $end - $start;
	if ($time > 0) {
		$seconds_in_a_day = 86400;
		$days = $time / $seconds_in_a_day;
		$integer_days = floor($days);
		$fractional_part = $days - $integer_days;
		if ($fractional_part > 0.1) {
			$days = $integer_days + 1;
		} else {
			$days = $integer_days;
		}

		$respon = "Chậm $days ngày";
	} else {
		$respon = 'Chậm 0 ngày';
	}
	return $respon;
}
function status_qa_check($id)
{
	switch ($id) {
		case 1:
			$status = 'Hoàn thành';
			break;
		case 2:
			$status = 'Đang triển khai';
			break;
		case 3:
			$status = 'Kiểm duyệt lại';
			break;
		default:
			$status = 'CTV chưa gửi bài';
			break;
	}
	return $status;
}
function array_status_qa_check()
{
	$array = [
		[
			'status' => 1,
			'name' => 'Hoàn thành'
		],
	];
	return $array;
}
function status_index($id)
{
	switch ($id) {
		case 1:
			$status = 'Có duyệt index';
			break;
		case 2:
			$status = 'Đã chuyển index';
			break;
		default:
			$status = 'Không duyệt index';
			break;
	}
	return $status;
}
function check_index($id)
{
	switch ($id) {
		case 1:
			$status = 'Hoàn thành';
			break;
		case 2:
			$status = 'Chưa hoàn thành';
			break;
		case 3:
			$status = 'Có thể check';
			break;
		default:
			$status = 'Chưa thể check';
			break;
	}
	return $status;
}
// function get_qa_success($project,$full)
// {
// 	$job_qa = fn_get_list('id', ['project_id' => $project, 'status_qa' => 1], 'jobs');
// 	$where = ' status = 1 AND ( ';
// 	foreach ($job_qa as $key => $val) {
// 		$cnt = ' OR ';
// 		if ($key == 0) {
// 			$cnt = '';
// 		}
// 		$where .= $cnt.' job_id = ' . $val['id'];
// 	}
// 	$where .= ' )';

// 	$job_qa_success = fn_get_num($where, 'jobs');
// 	if ($full == 0) {
// 		$status = 'Không cần QA check';
// 	} elseif ($job_qa_success == $full) {
// 		$status = 'Hoàn thành';
// 	} else {
// 		$status = 'Đang triển khai (' . $job_qa_success . '/' . $full . ')';
// 	}
// 	return $status;
// }

function job_qa_success($job_ctv, $job, $full)
{
	if ($job_ctv == 0) {
		$status = 'Đang triển khai (0/0)';
	} elseif ($full == 0) {
		$status = 'Không cần QA check';
	} elseif ($job > $full || $job == $full) {
		$status = 'Hoàn thành';
	} else {
		$status = 'Đang triển khai (' . $job . '/' . $full . ')';
	}
	return $status;
}
function array_job_qa_success()
{
	$array = [
		[
			'status' => 1,
			'name' => 'Không cần QA check'
		],
		[
			'status' => 2,
			'name' => 'Đang triển khai'
		],
		[
			'status' => 3,
			'name' => 'Hoàn thành'
		],
	];
	return $array;
}
function time_qa_check_new($where)
{
	$CI = &get_instance();
	$CI->load->database();

	$CI->db->select('time_qa_check');
	$CI->db->where($where);
	$CI->db->order_by('time_qa_check', 'DESC');
	$array = $CI->db->get('ctv_jobs')->row_array();
	return $array;
}

function get_qa_check($where)
{
	$CI = &get_instance();
	$CI->load->database();
	$CI->db->distinct();
	$CI->db->select('name,qa_id');
	$CI->db->join('users', 'users.id = ctv_jobs.qa_id');
	$CI->db->where($where);
	$array = $CI->db->get('ctv_jobs')->result_array();
	return $array;
}

function get_job_index($id)
{
	$CI = &get_instance();
	$CI->load->database();

	$CI->db->select('name');
	$CI->db->where(['id' => $id]);
	$array = $CI->db->get('job_index')->row_array();
	return $array['name'];
}
