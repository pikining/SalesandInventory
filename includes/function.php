<?php
include'../includes/connection.php';

$errors = array();

// FOR # COUNT ON TABLE
  function count_id(){
    static $count = 1;
    return $count++;
  }
  function count_id1(){
    static $count = 1;
    return $count++;
  }
// -----------------------
/* Function for Perform queries
/*--------------------------------------------------------------*/
// function find_by_sql($sql)
// {
//   global $db;
//   $result = $db->query($sql);
//   $result_set = $db->while_loop($result);
//  return $result_set;
// }
/*--------------------------------------------------------------*/
/* Function for Remove html characters
/*--------------------------------------------------------------*/
function remove_junk($str){
  $str = nl2br($str);
  $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
  return $str;
}
/*--------------------------------------------------------------*/
/* Function for Checking input fields not empty
/*--------------------------------------------------------------*/
function validate_fields($var){
  global $errors;
  foreach ($var as $field) {
    $val = remove_junk($_POST[$field]);
    if(isset($val) && $val==''){
      $errors = $field ." can't be blank.";
      return $errors;
    }
  }
}

/*--------------------------------------------------------------*/
 /* Function for Find Highest saleing Product
 /*--------------------------------------------------------------*/
 function find_higest_saleing_product($limit){
  global $db;
  $sql  = "SELECT PRODUCTS, COUNT(PRODUCTS_CODE) AS totalSold, SUM(QTY) AS totalQty";
  $sql .= "FROM transaction_details ";
  $sql .= " GROUP BY PRODUCTS_CODE";
  $sql .= " ORDER BY SUM(QTY) DESC LIMIT ";
  return $db->query($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate inventory report by two dates
/*--------------------------------------------------------------*/
function find_sale_by_dates($start_date,$end_date){
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  = "SELECT p.DESCRIPTION, p.NAME, p.PRICE,  p.ON_HAND,";
  $sql .= "p.PRODUCT_CODE, DATE_FORMAT(p.DATE_STOCK_IN, '%Y-%m-%e') AS date,p.p_unit,p.ON_HAND, ";
  $sql .= "sp.COMPANY_NAME, sb.SUB_NAME, c.CNAME, s.total_stock,p.PRICE*s.total_stock AS Totals ";
  $sql .= "FROM product p ";
  $sql .= "LEFT JOIN (SELECT PRODUCT_CODE,total_stock FROM stock) s ON p.PRODUCT_CODE = s.PRODUCT_CODE ";
  $sql .= "LEFT JOIN (SELECT SUPPLIER_ID,COMPANY_NAME FROM supplier) sp ON p.SUPPLIER_ID=sp.SUPPLIER_ID ";
  $sql .= "LEFT JOIN (SELECT SUB_ID,SUB_NAME FROM subcategory) as sb ON p.SUB_ID=sb.SUB_ID ";
  $sql .= "LEFT JOIN category c ON p.CATEGORY_ID=c.CATEGORY_ID ";
  $sql .= " WHERE DATE_FORMAT(p.DATE_STOCK_IN, '%Y-%m' ) BETWEEN '$start_date' AND '$end_date'";
  $sql .= " GROUP BY p.PRODUCT_CODE ASC";
  return $db->query($sql);
}
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function  monthlySales($year){
  global $db;
  // $sql  = "SELECT s.qty,";
  // $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  // $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  // $sql .= " FROM sales s";
  // $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  // $sql .= " WHERE DATE_FORMAT(s.date, '%Y' ) = '{$year}'";
  // $sql .= " GROUP BY DATE_FORMAT( s.date,  '%c' ),s.product_id";
  // $sql .= " ORDER BY date_format(s.date, '%c' ) ASC";

  $sql  = "SELECT p.DESCRIPTION, p.NAME, p.PRICE,  p.ON_HAND,";
  $sql .= "p.PRODUCT_CODE, DATE_FORMAT(p.DATE_STOCK_IN, '%Y-%m-%e') AS date ,p.p_unit,p.ON_HAND, ";
  $sql .= "sp.COMPANY_NAME, sb.SUB_NAME, c.CNAME, s.total_stock,p.PRICE*s.total_stock AS Totals ";
  $sql .= "FROM product p ";
  $sql .= "LEFT JOIN (SELECT PRODUCT_CODE,total_stock FROM stock) s ON p.PRODUCT_CODE = s.PRODUCT_CODE ";
  $sql .= "LEFT JOIN (SELECT SUPPLIER_ID,COMPANY_NAME FROM supplier) sp ON p.SUPPLIER_ID=sp.SUPPLIER_ID ";
  $sql .= "LEFT JOIN (SELECT SUB_ID,SUB_NAME FROM subcategory) as sb ON p.SUB_ID=sb.SUB_ID ";
  $sql .= "LEFT JOIN category c ON p.CATEGORY_ID=c.CATEGORY_ID ";
  $sql .= " WHERE DATE_FORMAT(p.DATE_STOCK_IN, '%Y-%m' ) = '{$year}'";
  $sql .= " GROUP BY DATE_FORMAT( p.DATE_STOCK_IN,  '%c' ),p.PRODUCT_CODE";
  $sql .= " ORDER BY date_format(p.DATE_STOCK_IN, '%c' ) ASC";
  return $db->query($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Daily sales report
/*--------------------------------------------------------------*/
function  dailySales($year){
  global $db;
  // $sql  = "SELECT s.qty,";
  // $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  // $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  // $sql .= " FROM sales s";
  // $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  // $sql .= " WHERE DATE_FORMAT(s.date, '%Y' ) = '{$year}'";
  // $sql .= " GROUP BY DATE_FORMAT( s.date,  '%c' ),s.product_id";
  // $sql .= " ORDER BY date_format(s.date, '%c' ) ASC";

  $sql  = "SELECT p.DESCRIPTION, p.NAME, p.PRICE,  p.ON_HAND,";
  $sql .= "p.PRODUCT_CODE, DATE_FORMAT(p.DATE_STOCK_IN, '%Y-%m-%e') AS date ,p.p_unit,p.ON_HAND, ";
  $sql .= "sp.COMPANY_NAME, sb.SUB_NAME, c.CNAME, s.total_stock,p.PRICE*s.total_stock AS Totals ";
  $sql .= "FROM product p ";
  $sql .= "LEFT JOIN (SELECT PRODUCT_CODE,total_stock FROM stock) s ON p.PRODUCT_CODE = s.PRODUCT_CODE ";
  $sql .= "LEFT JOIN (SELECT SUPPLIER_ID,COMPANY_NAME FROM supplier) sp ON p.SUPPLIER_ID=sp.SUPPLIER_ID ";
  $sql .= "LEFT JOIN (SELECT SUB_ID,SUB_NAME FROM subcategory) as sb ON p.SUB_ID=sb.SUB_ID ";
  $sql .= "LEFT JOIN category c ON p.CATEGORY_ID=c.CATEGORY_ID ";
  $sql .= " WHERE DATE_FORMAT(p.DATE_STOCK_IN, '%Y-%m-%d' ) = '{$year}'";
  $sql .= " GROUP BY DATE_FORMAT( p.DATE_STOCK_IN,  '%c' ),p.PRODUCT_CODE";
  $sql .= " ORDER BY date_format(p.DATE_STOCK_IN, '%c' ) ASC";
  return $db->query($sql);
}
/*--------------------------------------------------------------*/
  /* Function for Finding all product name
  /* Request coming from ajax.php for auto suggest
  /*--------------------------------------------------------------*/

  // function find_product_by_title($product_name){
  //   global $db;
  //   $p_name = remove_junk($db->escape($product_name));
  //   $sql = "SELECT name FROM products WHERE name like '%$p_name%' LIMIT 5";
  //   $result = find_by_sql($sql);
  //   return $result;
  // }

 /*--------------------------------------------------------------*/

 function total_price($totals){
  $sum = 0;
  foreach($totals as $total ){
    $sum += $total['Totals'];
    $profit = $sum ;
  }
  return array($sum,$profit);
}



?>
