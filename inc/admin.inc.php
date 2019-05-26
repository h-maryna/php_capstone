<!doctype html>

<html lang="en">

  <head>
    <meta charset="utf-8" />
    
    <meta name="description" content="Coffee Time is a coffee shop with variety of coffee drinks and baked goods, located in heart of city Winnipeg, in Downtown, address 123Portage Avenue" />
    <meta name="keyword" content="coffee shop, coffee cafe, cafe downtown winnipeg, coffee and baked goods, winnipeg, places to relax" />    

    <div id="nav_admin">
    <nav>
        <ul>
          <li><a href="admin_dashboard.php" class="page11">Dashboard</a></li>
          <li><a href="admin_page.php" class="page12">Log</a></li>
          <li><a href="admin_products.php" class="page13">Products</a></li>
          <li><a href="admin_customers.php" class="page14">Customers</a></li>
          <li><a href="admin_orders.php" class="page15">Orders</a></li>
        </ul>
    </nav>
  </div>
      </header>
      <script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Clients orders"
  },
  axisY: {
    title: "Clients orders (in CAN)"
  },
  data: [{
    type: "column",
    yValueFormatString: "#,##0.## CAN",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>

<!--
<ul>
  <li><a href="admin_add_product.php" class="page16">Add product</li>
  <li><a href="admin_update_products.php" class="page17">Update product</li></li>
    </ul>
  <li><a href="admin_customers.php" class="page14">Customers</a></li>
    <ul>
      <li><a href="admin_add_customer.php" class="page18">Add customer</li>
      <li><a href="admin_update_customers.php" class="page19">Update customer</li></li>
    </ul>
  <li><a href="admin_orders.php" class="page15">Orders</a></li>
    <ul>
      <li><a href="admin_add_order.php" class="page20">Add order</li>
      <li><a href="admin_update_orders.php" class="page21">Update order</li></li>
    </ul>
</ul> -->