<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: login.html");
    }
    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status'] == 0){
        $status = '<b style = "color:red">Not Voted</b>';
    }
    else{
        $status = '<b style = "color:green">Voted</b>';
    }
?>
<html>
    <head>
        <title>Online Voting System - Dashboard</title>
        <link rel = "stylesheets" href = "Login.css">
    </head>
    <body>
        <style>
            body{
                
                background: linear-gradient(to bottom right, #78D2C4, #0C2A67);

            }
            #headersection{
                padding: 10px ;
            }

            #headersection h1{
                font-family: cursive;
            }

            #backbtn{
                padding: 5px;
                font-size: 15px;
                border-radius: 5px; 
                background-color: rgb(52, 146, 45);
                color: white;
                float: left;
                margin: 10px;
            }

            #logoutbtn{
                padding: 5px;
                font-size: 15px;
                border-radius: 5px; 
                background-color: rgb(52, 146, 45);
                color: white;
                float: right;
                margin: 10px;
            }

            #profile{
                background: white;
                width: 30%;
                padding: 20px;
                float: left;
            }

            #Group{
                background: white;
                width: 60%;
                padding: 20px;
                float: right;
            }

            #votebtn{
                padding: 5px;
                font-size: 15px;
                border-radius: 5px; 
                background-color: rgb(52, 146, 45);
                color: white;
            }
            
            #mainpanel{
                padding: 10px;
            }
            
            #voted{
                padding: 5px;
                font-size: 15px;
                border-radius: 5px; 
                background-color: green;
                color: white;
            }
        </style>

        <div id= "mainsection">
            <center>
            <div id = "headerSection">
            <a href = "login.html"><button id = "backbtn">Back</button></a>
            <a href = "logout.php"><button id = "logoutbtn">Logout</button></a>
                <h1>Online Voting System</h1>
            </div>
            </center>
            <hr>
            <div id = "mainpanel">
            <div id="Profile">
                <b>Name:</b> <?php echo $userdata['name']?><br><br>
                <b>mobile:</b> <?php echo $userdata['mobile']?><br><br>
                <b>Address:</b> <?php echo $userdata['address']?><br><br>
                <b>Status:</b> <?php echo $status?><br><br>
            </div>
            <div id="Group">
                <?php
                    if($_SESSION['groupsdata']){
                        for($i = 0; $i<count($groupsdata);$i++){
                            ?>
                               <div>
                                   <b>Group Name:</b> <?php echo $groupsdata[$i]['name']?><br><br>
                                   <b>Votes:</b> <?php echo $groupsdata[$i]['votes']?><br><br>
                                   <form action="vote.php" method = "post">
                                        <input type="hidden" name = "gvotes" value = "<?php echo $groupsdata[$i]['votes']?>">
                                        <input type="hidden" name = "gid" value = "<?php echo $groupsdata[$i]['id']?>">
                                        <?php
                                            if($_SESSION['userdata']['status']==0){
                                                ?>
                                                <input type="submit" name = "votebtn" value = "vote" id = "votebtn">
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <button disabled type="button" name = "votebtn" value = "voted" id = "voted">Voted</button>
                                                <?php
                                            }

                                        ?>
                                        
                                   </form>
                               </div> 
                               <hr>
                            <?php
                        }
                    }
                
                ?>
            </div>
            </div>

        </div>
        
    </body>
</html>



