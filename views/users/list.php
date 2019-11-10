<body class="col sc pdgT100">
    <div class="container">
        <?php 
            while($row = $this->empleados->fetch() ) {
               echo "<p>". $row['usrname'] . "<p>";
            }
        ?>
    </div>
</body>