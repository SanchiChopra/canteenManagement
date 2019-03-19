<!DOCTYPE html>
<?php 
    include('sessioncust.php');
    $uname = $_SESSION['login_user'];
    $sql = "SELECT * from customer where custid='$uname'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $oid = $_GET['oid'];
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/stordstatc.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/grid.css">
        <title>Student</title>
    </head>
    <body>
        <section class="section-cant">
            <div class="row">
                <div class="col span-10-of-12">
                    <img src="images/person.png" style="border-radius: 20%; width: 5vw;">
                    <div style="display: inline-block; vertical-align: super"><?php echo $row['name']?><br><?php echo $row['custid']?></div>
                </div>
                <div class="col span-1-of-12"><a style="text-decoration: none; background-color: #18314f; padding: 10% 20%; color: white; vertical-align: text-bottom; margin-top: 20%; margin-bottom: 20%; box-shadow: 4px 4px 10px rgba(72, 39, 10, 0.15)" href="profile.php">Profile</a></div>
                <div class="col span-1-of-12"><a style="text-decoration: none; background-color: #18314f; padding: 10% 20%; color: white; vertical-align: text-bottom; margin-top: 20%; margin-bottom: 20%; box-shadow: 4px 4px 10px rgba(72, 39, 10, 0.15)" href="index.php">Logout</a></div>

            </div>
        </section>
        <section class="section-plans">
			<div class="row">
				<h2>Order Number: <?php 
                        echo $oid;
                    ?></h2>
			</div>
            <div class="row">
                <table>
                    <tr>
                        <td width=15 style="text-align: center;"><strong>Item Name</strong></td>
                        <td width=15 style="text-align: center;"><strong>Quantity Date</strong></td>
                        <td width=15 style="text-align: center;"><strong>Price</strong></td>
                    </tr>
                    <?php
                        $c = "select * from ord where oid='$oid'";
                        $res = mysqli_query($db,$c);
                        $det = mysqli_fetch_array($res,MYSQLI_ASSOC);
                        $q = "SELECT * from orderdet where oid='$oid'";
                        $r = mysqli_query($db,$q);
                        while($item = mysqli_fetch_array($r,MYSQLI_ASSOC)){
                            $iid = $item['iid'];
                            if($det['cid']==919){
                                $s = "select * from sjtalacarte where iid='$iid'";
                                $quer = mysqli_query($db,$s);
                                $ala = mysqli_fetch_array($quer,MYSQLI_ASSOC);
                                echo "<tr><td style=\"text-align: center;\">".$ala['name']."</td><td style=\"text-align: center;\">".$item['qty']."</td><td style=\"text-align: center;\">".$item['qty']*$ala['price']."</td></tr>";
                            }
                            else if($det['cid']==943){
                                $s = "select * from dcalacarte where iid='$iid'";
                                $quer = mysqli_query($db,$s);
                                $ala = mysqli_fetch_array($quer,MYSQLI_ASSOC);
                                echo "<tr><td style=\"text-align: center;\">".$ala['name']."</td><td style=\"text-align: center;\">".$item['qty']."</td><td style=\"text-align: center;\">".$item['qty']*$ala['price']."</td></tr>";
                            }
                            else if($det['cid']==2015){
                                $s = "select * from nacalacarte where iid='$iid'";
                                $quer = mysqli_query($db,$s);
                                $ala = mysqli_fetch_array($quer,MYSQLI_ASSOC);
                                echo "<tr><td style=\"text-align: center;\">".$ala['name']."</td><td style=\"text-align: center;\">".$item['qty']."</td><td style=\"text-align: center;\">".$item['qty']*$ala['price']."</td></tr>";
                            }
                            else if($det['cid']==2038){
                                $s = "select * from acalacarte where iid='$iid'";
                                $quer = mysqli_query($db,$s);
                                $ala = mysqli_fetch_array($quer,MYSQLI_ASSOC);
                                echo "<tr><td style=\"text-align: center;\">".$ala['name']."</td><td style=\"text-align: center;\">".$item['qty']."</td><td style=\"text-align: center;\">".$item['qty']*$ala['price']."</td></tr>";
                            }
                            else{
                                $s = "select * from dalacarte where iid='$iid'";
                                $quer = mysqli_query($db,$s);
                                $ala = mysqli_fetch_array($quer,MYSQLI_ASSOC);
                                echo "<tr><td style=\"text-align: center;\">".$ala['name']."</td><td style=\"text-align: center;\">".$item['qty']."</td><td style=\"text-align: center;\">".$item['qty']*$ala['price']."</td></tr>";
                            }
                        }
                    ?>
                </table>
                <div style="text-align:center; margin-top: 2vw;">Total Price : <?php echo $det['cost']; ?></div>
            </div>
		</section>
        <section class="section-plans">
            <div class="row">
                <a style="text-decoration: none; color:#18314f;" href="homepage.php">
                    <div class="col span-5-of-11" style="box-shadow: 4px 4px 10px rgba(72, 39, 10, 0.15); text-align: center; padding: 1%;border: 2px solid #18314f;margin-left:21vw;">
                        GO BACK
                    </div>
                </a>
            </div>
        </section>
   </body>
</html>
