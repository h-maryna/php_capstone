


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
