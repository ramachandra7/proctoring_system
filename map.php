<?php

if (isset($_POST['fsearch']))
{
    $db = mysqli_connect("localhost", "root", "", "ost_project");

    if ($_POST['fid_name'] != "")
    {
        $fid_name = $_POST['fid_name'];
        $qry = "SELECT * from faculty where regdNo='$fid_name' or name='$fid_name' ";
        $res = mysqli_query($db, $qry);
        
        // $fsearch->fid_name=$fid_name;
    }
    else if (isset($_POST['department']))
    {
        $department = $_POST['department'];
        $qry = "SELECT * from faculty where department='$department' ";
        $res = mysqli_query($db, $qry);
        
        // $fsearch->dapartment=$dapartment;
    }
}

if (isset($_POST['ssearch']))
{
    $db = mysqli_connect("localhost", "root", "", "ost_project");

    if ($_POST['studid_name'] != "")
    {
        $studid_name = $_POST['studid_name'];
        $qry = "SELECT * from students s inner join map_fac_to_student map where map.s_regdNo=s.regdNo and map.s_regdNo='$studid_name' and map.f_regdNo IS NULL ";
        $sres = mysqli_query($db, $qry);
    }
    else if (isset($_POST['department']))
    {
        $department = $_POST['department'];
        $section = $_POST['section'];
        $qry = "SELECT * from students s, map_fac_to_student map where s.department='$department' and s.section='$section' and map.s_regdNo=s.regdNo and map.f_regdNo IS NULL ";
        $sres = mysqli_query($db, $qry);
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Map</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./map.css">

</head>

<body>
    <nav>
        <div class="label">online Proctoring System</div>
        <div class="controls">
            <div class="home"><a href="../admin_home/admin_home.html">Home</a></div>
        </div>
    </nav>
    <div class="container">
        <div class="rules"></div>
        <div class="map-container">
            <div class="faculty-chooser">
                <div class="faculty-search">
                    <form method="post">
                        <input type="text" placeholder="enter faculty id or name" name="fid_name" class="faculty-search-input">
                        <div class="fac-dept-select">
                            <select name="department" class="department">
                                <option value="">select department</option>
                                <option value="cse">Computer science</option>
                                <option value="mech">Mechanical</option>
                                <option value="it">Information Tech</option>
                                <option value="eee">Electrical Engg.</option>
                            </select>
                        </div>
                        <div class="f-submit">
                            <!-- <div class="text">Search</div> -->
                            <input type="submit" class="text" name="fsearch">
                        </div>
                    </form>
                </div>
               <!-- <div class="fac-list"> -->
                    <!-- added with js -->
                    <<!-- div class="facultyList-overlay">
                        <div class="text">
                            faculty Data will be shown here....<br/> search faculty by Anits id or name or by department
                        </div>
                    </div>
                </div> -->
                <div class="fac-list">
                    <?php


                     while($row = mysqli_fetch_assoc($res)) {?>
                        <div class="fac-item">
                            <div class="name"><?php echo $row['name']; ?></div>
                            <div class="branch-details">
                                <div class="regdNo" id="<?php echo $row['regdNo']; ?>"><?php echo $row['regdNo']; ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- map area main target -->
            <div class="map-area">
                <div class="mapped-list">
                    <!-- added with js  -->
                    <div class="maplist-overlay">
                        <div class="guide">
                            <div class="fac-search-rule">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path
                                            d="M216.4 163.7c5.1 5 5.1 13.3.1 18.4L155.8 243h231.3c7.1 0 12.9 5.8 12.9 13s-5.8 13-12.9 13H155.8l60.8 60.9c5 5.1 4.9 13.3-.1 18.4-5.1 5-13.2 5-18.3-.1l-82.4-83c-1.1-1.2-2-2.5-2.7-4.1-.7-1.6-1-3.3-1-5 0-3.4 1.3-6.6 3.7-9.1l82.4-83c4.9-5.2 13.1-5.3 18.2-.3z" />
                                        </svg>
                                </div>
                                <div class="rule">the list of faculty can be found by searching here</div>
                            </div>
                            <div class="student-search-rule">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path
                                            d="M295.6 163.7c-5.1 5-5.1 13.3-.1 18.4l60.8 60.9H124.9c-7.1 0-12.9 5.8-12.9 13s5.8 13 12.9 13h231.3l-60.8 60.9c-5 5.1-4.9 13.3.1 18.4 5.1 5 13.2 5 18.3-.1l82.4-83c1.1-1.2 2-2.5 2.7-4.1.7-1.6 1-3.3 1-5 0-3.4-1.3-6.6-3.7-9.1l-82.4-83c-4.9-5.2-13.1-5.3-18.2-.3z" />
                                        </svg>
                                </div>
                                <div class="rule">the student can be found by searching here...</div>
                            </div>
                            <div class="main-rule">
                                <div class="text">
                                    you dont need to click anything to map! we will automatically update the Progress..
                                    <br/><br/> if error occurs we will notify you!<br/>
                                    <br/> you just need to select faculty and then students<br/> you can also unmap the students by clicking <span class="trash">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M133.1 128l23.6 290.7c0 16.2 13.1 29.3 29.3 29.3h141c16.2 0 29.3-13.1 29.3-29.3L379.6 128H133.1zm61.6 265L188 160h18.5l6.9 233h-18.7zm70.3 0h-18V160h18v233zm52.3 0h-18.6l6.8-233H324l-6.7 233zM364 92h-36l-26.3-23c-3.7-3.2-8.4-5-13.2-5h-64.8c-4.9 0-9.7 1.8-13.4 5L184 92h-36c-17.6 0-30 8.4-30 26h276c0-17.6-12.4-26-30-26z" />
                                        </svg>
                                    </span> button
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ProcessStatus">
                    <div class="notifier">
                        <div class="icon">
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M433 288.8c-7.7 0-14.3 5.9-14.9 13.6-6.9 83.1-76.8 147.9-161.8 147.9-89.5 0-162.4-72.4-162.4-161.4 0-87.6 70.6-159.2 158.2-161.4 2.3-.1 4.1 1.7 4.1 4v50.3c0 12.6 13.9 20.2 24.6 13.5L377 128c10-6.3 10-20.8 0-27.1l-96.1-66.4c-10.7-6.7-24.6.9-24.6 13.5v45.7c0 2.2-1.7 4-3.9 4C148 99.8 64 184.6 64 288.9 64 394.5 150.1 480 256.3 480c100.8 0 183.4-76.7 191.6-175.1.8-8.7-6.2-16.1-14.9-16.1z" />
                            </svg> -->
                        </div>
                        <div class="logmsg message">
                            logs will be shown here..
                        </div>
                    </div>
                    <div class="note">
                        you can map Only 15 students per a Faculty but you can override that by clicking this
                        <label class="switch" for="checkbox">
                            <input type="checkbox" id="checkbox" class="override" />
                            <div class="slider round"></div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="student-chooser">
                <div class="student-search">
                    <form method="post" action="map.php">
                        <input type="text" placeholder="enter student id or name" name="studid_name" class="student-search-input">
                        <div class="student-dept-select">
                            <select name="department" class="department">
                                <option value="cse">Computer science</option>
                                <option value="mech">Mechanical</option>
                                <option value="it">Information Tech</option>
                                <option value="eee">Electrical Engg.</option>
                            </select>
                        </div>
                        <div class="student-section-select">
                            <select name="section" class="section">
                                <option value="a">A section</option>
                                <option value="b">B section</option>
                                <option value="c">C section</option>
                            </select>
                        </div>
                      
                          <div class="s-submit">
                            <!-- <div class="text">Search</div> -->
                            <input type="submit" class="text" name="ssearch">
                        </div>
                    </form>
                </div>
                <!-- to display found students -->
                <div class="student-list">
                    <!-- added with javascript -->
                    <!-- <div class="studentList-overlay">
                        <div class="text">
                            student Data will be shown here...<br/> Try searching students by name,regd No.,department,section
                        </div>
                    </div> -->
                    <?php while($row = mysqli_fetch_assoc($sres)) {?>

                    <div class="student-item">
                        <div class="dataholder" data-st-data="{&quot;regdNo&quot;:&quot;<?php echo $row['regdNo']; ?>&quot;,&quot;name&quot;:&quot;<?php echo $row['name']; ?>&quot;,&quot;year&quot;:&quot;<?php echo $row['year']; ?>&quot;,&quot;section&quot;:&quot;<?php echo $row['section']; ?>&quot;,&quot;department&quot;:&quot;<?php echo $row['department']; ?>&quot;}"></div>
                        <div class="name"><?php echo $row['name']; ?></div>
                        <div class="regdNo" id="317126510124"><?php echo $row['regdNo']; ?></div>
                        <div class="year"><?php echo $row['year']; ?> year</div>
                        <div class="section-wrapper"><span class="section"><?php echo $row['section']; ?></span> section</div>
                        <div class="department"><?php echo $row['department']; ?></div>
                        <div class="student-overlay">
                            <div class="select-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M368.5 240H272v-96.5c0-8.8-7.2-16-16-16s-16 7.2-16 16V240h-96.5c-8.8 0-16 7.2-16 16 0 4.4 1.8 8.4 4.7 11.3 2.9 2.9 6.9 4.7 11.3 4.7H240v96.5c0 4.4 1.8 8.4 4.7 11.3 2.9 2.9 6.9 4.7 11.3 4.7 8.8 0 16-7.2 16-16V272h96.5c8.8 0 16-7.2 16-16s-7.2-16-16-16z"></path>
                                </svg>
                            </div>
                            <div class="text">
                                Click to Select
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>

            </div>
        </div>
    </div>
 <!--    <div class="mapped-student-div"> 
        <div class=" mapped-student">    
            <div class="student-data">
                <div class="dataholder" data-st-data=""></div>
                <div class="name">Varaprasadh Alajangi</div>
                <div class="regdNo">316126510201</div>
                <div class="year">3rd year</div>
                <div class="section-wrapper"><span class="section">C</span> section</div>
                <div class="department">Cse</div>
            </div>
            <div class="unmap">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M133.1 128l23.6 290.7c0 16.2 13.1 29.3 29.3 29.3h141c16.2 0 29.3-13.1 29.3-29.3L379.6 128H133.1zm61.6 265L188 160h18.5l6.9 233h-18.7zm70.3 0h-18V160h18v233zm52.3 0h-18.6l6.8-233H324l-6.7 233zM364 92h-36l-26.3-23c-3.7-3.2-8.4-5-13.2-5h-64.8c-4.9 0-9.7 1.8-13.4 5L184 92h-36c-17.6 0-30 8.4-30 26h276c0-17.6-12.4-26-30-26z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="fac-item-div">
        <div class="fac-item">
            <div class="name">Johua Jhonson</div>
            <div class="branch-details">
                <div class="regdNo">Anit123</div>
            </div>
        </div>
    </div>

    <div class="student-item-div">
            <div class="student-item">
                <div class="dataholder" data-st-data=""></div>
                <div class="name">Varaprasadh Alajangi</div>
                <div class="regdNo">316126510201</div>
                <div class="year">3rd year</div>
                <div class="section-wrapper"><span class="section">C</span> section</div>
                <div class="department">Cse</div>
                <div class="student-overlay">
                    <div class="select-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M368.5 240H272v-96.5c0-8.8-7.2-16-16-16s-16 7.2-16 16V240h-96.5c-8.8 0-16 7.2-16 16 0 4.4 1.8 8.4 4.7 11.3 2.9 2.9 6.9 4.7 11.3 4.7H240v96.5c0 4.4 1.8 8.4 4.7 11.3 2.9 2.9 6.9 4.7 11.3 4.7 8.8 0 16-7.2 16-16V272h96.5c8.8 0 16-7.2 16-16s-7.2-16-16-16z" />
                        </svg>
                    </div>
                    <div class="text">
                        Click to Select
                    </div>
                </div>
            </div>

  </div> -->

</body>

</html>