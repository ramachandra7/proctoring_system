<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./addStudent.css">
</head>

<body>
    <nav>
        <div class="label">Proctoring System</div>
        <div class="controls">
            <div class="home"><a href="../admin_home/admin_home.php">Home</a></div>
        </div>
    </nav>
    <div class="container">

        <div class="form-wrapper">
            <form method="post" enctype="multipart/form-data" action="stud_reg.php">
                <div class="import-wrapper">
                    <div class="import-opt data-input">
                        <div class="import-label">
                            Import student data from file!
                        </div>
                        <!-- <input type="file" accept=".csv,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="file" id="file"> -->
                    </div>
                    <!-- <div class="import-opt photo-input">
                        <div class="import-label">
                            Import student Photos
                        </div>
                    </div> -->
                </div>

                <div class="or">
                    <div class="txt">or</div>
                </div>
                <div class="add-form">
                    <div class="inputrow">
                        <input type="file" accept="image/*" multiple name="student_img" id="pics111">
                        <label>name</label>
                        <input type="text" placeholder="enter full name" id="name" name="name">
                        <div class="error">
                            <p>invalid name</p>
                        </div>
                    </div>
                    <div class="inputrow">
                        <label>father name</label>
                        <input type="text" placeholder="enter father's name" id="name" name="fname">
                        <div class="error">
                            <p>invalid father name</p>
                        </div>
                    </div>

                    <div class="inputrow">
                        <label>registration No</label>
                        <input type="number" placeholder="enter regd number" id="regdNo" name="regdNo">
                        <div class="error">
                            <p>invalid registration number</p>
                        </div>
                    </div>
                    <div class="inputrow">
                        <label>department</label>
                        <select name="department" id="department">
                                <option value="">select</option>
                                <option value="cse">cse</option>
                                <option value="ece">ece</option>
                                <option value="mech">mech</option>
                                <option value="eee">eee</option>
                            </select>
                        <div class="error">
                            <p>select valid department</p>
                        </div>
                    </div>
                    <div class="inputrow">
                        <label>year</label>
                        <select name="year" id="year" >
                                <option value="">select</option>
                                <option value="1">1st year</option>
                                <option value="2">2nd year</option>
                                <option value="3">3rd year</option>
                                <option value="4">4th year</option>
                            </select>
                        <div class="error">
                            <p>select year</p>
                        </div>
                    </div>
                    <div class="inputrow">
                        <label>section</label>
                        <select name="section" id="section">
                                <option value="">select</option>
                                <option value="A">A section</option>
                                <option value="B">B section</option>
                                <option value="C">C section</option>
                            </select>
                        <div class="error">
                            <p>select section</p>
                        </div>
                    </div>
                    <div class="inputrow">
                        <label>Mobile</label>
                        <input type="number" placeholder="enter mobile number" id="mobile" name="mobile" minlength="10" maxlength="10">
                        <div class="error">
                            <p>enter valid mobile number</p>
                        </div>
                    </div>
                    <div class="inputrow">
                        <label>email</label>
                        <input type="email" placeholder="enter email id" id="email" name="email">
                        <div class="error">
                            <p>enter valid email id</p>
                        </div>
                    </div>
                    <div class="inputrow">
                        <label>Address</label>
                        <input type="text" placeholder="enter address" id="address" name="address">
                         
                    </div>
                    <button class="submit" onclick="window.location.href='../../admin/PendingRegistrations/accept.php';" >Submit</button>

                </div>
            </form>
        </div>


    </div>

</body>

</html>