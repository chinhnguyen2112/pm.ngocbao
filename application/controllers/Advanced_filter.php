<?php
error_reporting(1);
defined('BASEPATH') or exit('No direct script access allowed');
class Advanced_filter extends CI_Controller
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

    public function advanced_filter()
    {
        $page_id = $this->input->get('id');
        $id_u = get_id();
        if (admin()) {
            if ((($page_id == 1 || $page_id == 2 || $page_id == 3) && (check_role() == 1 || check_role() == 2)) || ($page_id == 4 && check_role() == 5) || ($page_id == 5 && check_role() == 4) || ($page_id == 6 && check_role() == 3)) {
                $advanced = $this->Madmin->get_by(['user_id' => $id_u, 'page_id' => $page_id], 'advanced_filter');
            }else {
                set_status_header(404);
                return $this->load->view('errors/html/error_role');
            }
            $data['list_advanced'] = '';
            if ($advanced != null) {
                $data['list_advanced'] = $advanced['list'];
            }
            $data['page_advanced'] = $page_id;
            $data['meta_title'] = 'Cấu hình bộ lọc';
            $data['content'] = 'advanced_filter/advanced_filter';
            $data['list_js'] = [
                'advanced_filter/advanced_filter.js',
            ];
            $data['list_css'] = [
                'advanced_filter/advanced_filter.css'
            ];
            return $this->load->view('index', $data);
        } else {
            redirect('/dang-nhap/');
        }
    }
    public function save_advanced_filter()
    {
        $data['page_id'] = $page_id = $this->input->post('page_id');
        $data['user_id'] = $id_u = get_id();
        if ((($page_id == 1 || $page_id == 2 || $page_id == 3) && (check_role() == 1 || check_role() == 2)) || ($page_id == 4 && check_role() == 5) || ($page_id == 5 && check_role() == 4) || ($page_id == 6 && check_role() == 3)) {
            $data['list'] = $this->input->post('arr_hide');
            $advanced = $this->Madmin->get_by(['user_id' => $id_u, 'page_id' => $page_id], 'advanced_filter');
            if ($advanced != null) {
                $update = $this->Madmin->update(['user_id' => $id_u, 'page_id' => $page_id], $data, 'advanced_filter');
            } else {
                $insert = $this->Madmin->insert($data, 'advanced_filter');
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
}
