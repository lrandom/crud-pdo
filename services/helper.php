<?php

//hàm lấy về vị trí bản ghi trong danh sách trả về
if (!function_exists('getOffsetInRS')) {
    function getOffsetInRS ($page, $displayPerPage)
    {
        //thuật toán phân trang
        return ($page - 1)*$displayPerPage;
    }
}
?>
