<header id="myHeader">
    <div>
        <a href="index.php"> <h3>Cuy Resto</h3></a>
       
    </div>
    <div>
        <?php
        if(isset($_SESSION['is_login'])){
            echo "<a href = 'logout.php'>logout</a>";
        }else{
            echo "<a href = 'login.php'>login</a>";
        }
         
        ?>
    </div>
</header>
