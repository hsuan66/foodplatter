<?php
session_start();

// 只要沒有user資料，就要回到燈入夜面
if(!isset($_SESSION["user"])){
    header("location:user_signin.php");
    exit;
}

require_once("db-connect.php");



$id=$_SESSION["user"]["user_id"];


$sql="SELECT * FROM users WHERE user_id=$id AND user_valid=1";

$result=$conn->query($sql);
$userCount=$result->num_rows;
$row=$result->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Foodplatter會員資料編輯</title>

    <!--此模板的自訂字體-->
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!--此模板的自訂樣式-->
    <link href="css/sb-admin-2.css" rel="stylesheet" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"
    />

    <style>

      .card-body{
        & img{
          width: 400px;
          height: 400px;
        }
      }

      .pic{
        & img{
          width: 50px;
          height: 50px;

        }
        & input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        
      }

      
      
    </style>

  </head>

  <body id="page-top">
    <!-- 登出彈出視窗 -->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">確定要登出嗎?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            如果您正準備登出，請點選下面的「登出」。
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              取消
            </button>
            <a class="btn btn-primary" href="UserSignout.php">登出</a>
          </div>
        </div>
      </div>
    </div>
    <!-- 登出彈出視窗結束 -->

    <div id="wrapper" class="">
      <!--側邊欄-->
      <ul
        class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <!--側邊欄-品牌-->
        <a
          class="sidebar-brand d-flex align-items-center justify-content-center"
          href="index.php"
        >
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="bi bi-slack"></i>
          </div>
          <div class="sidebar-brand-text mx-3">foodplatter</div>
        </a>
        
        <!-- 會員頭貼 -->
        <div class="d-flex align-items-center justify-content-center row">
          <img
            class="img-profile rounded-circle col-7 py-3"
            src="<?= $row["user_img"] ?>"
          />

          <span class="text-white col-12 text-center py-3">Hello ! <?= $row["user_name"]?></span>
        </div>

        <hr class="sidebar-divider my-0" />

        <!-- nav -->
        <li class="nav-item active">
          <a class="nav-link" href="user_index.php">
            
            <span><i class="bi bi-house"></i>會員資料</span>
          </a>
        </li>

        <hr class="sidebar-divider" />
        
        <li class="nav-item">
          <a class="nav-link" href="user_order.php">
            
            <span><i class="bi bi-file-earmark"></i>訂單</span></a
          >
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="user_coupon.php">
            
            <span><i class="bi bi-ticket-perforated"></i>優惠券</span></a
          >
        </li>

        <!--側邊欄切換器（側邊欄）-->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <!--側邊欄尾-->


      <!--內容-->
      <div id="content-wrapper" class="d-flex flex-column">
        
        <div id="content">
          <!--頂欄-->
          <nav
            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
          >
            <!--側邊欄切換（頂欄）-->
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3"
            >
              <i class="fa fa-bars"></i>
            </button>

            <!--中間頂欄-->
            <ul class="navbar-nav ml-auto">
              <!--導航項目 -搜尋下拉式選單（僅 XS 可見）-->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="searchDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <!--下拉式選單 -訊息-->
                <div
                  class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                  aria-labelledby="searchDropdown"
                >
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control bg-light border-0 small"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2"
                      />
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>

              <!--導航項目 -使用者資訊-->
              <li class="nav-item dropdown no-arrow d-flex">
                <div class="nav-link" href="#" id="">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    >Hello ! <?= $row["user_name"]?></span
                  >
                  <img
                    class="img-profile rounded-circle"
                    src="<?= $row["user_img"] ?>"
                  />
                </div>

                <div class="topbar-divider d-none d-sm-block"></div>

                <a class="nav-link"
                href="#"
                data-toggle="modal"
                data-target="#logoutModal">
                  <i
                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                  ></i>
                </a>
              </li>
            </ul>
          </nav>
          <!-- 頂欄結束 -->



          <!-- 頁面內容開始 -->
          <div class="container-fluid">
            
            <div
              class="d-sm-flex align-items-center justify-content-start mb-4"
            >
              <a class="btn btn-primary mr-3" href="user_index.php"><i class="bi bi-arrow-left"></i></a>
              <h1 class="h3 mb-0 text-gray-800 ">詳細資訊</h1>
              
            </div>

            <div class="row">
              
              <div class="col-12">
                <div class="card shadow mb-4">
                  
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                  >
                    <h6 class="m-0 font-weight-bold text-primary">
                      會員資料修改
                    </h6>
                    
                  </div>

                  <form class="" action="UserUpdate.php" method="post">
                      <div class="card-body row">

                        <!-- 會員資訊修改 -->
                          <div class="col-4">
                            <h6 class="pt-5">頭貼</h6>

                            <div class="justify-content-center d-flex">
                              
                              <img
                                class="img-profile rounded-circle mainpic"
                                src="<?= $row["user_img"] ?>"/>
                            </div>
                            

                            <h6 class="pt-5">點擊即可變換頭貼</ㄋ>

                            <div class="thumb d-flex justify-content-around my-3">
                              <div class="pic mx-2"><input id="head1" type="radio" name="head" value="images/head/1.svg"><label for="head1"><img
                                class="subpic object-fit-cover"
                                data-color="1"
                                src="images/head/1.svg"
                                alt=""
                              /></label>
                              </div>

                              <div class="pic mx-2"><input id="head2" type="radio" name="head" value="images/head/2.svg"><label for="head2"><img
                                  class="subpic object-fit-cover"
                                  data-color="2"
                                  src="images/head/2.svg"
                                  alt=""
                                /></label>
                              </div>

                              <div class="pic mx-2"><input id="head3" type="radio" name="head" value="images/head/3.svg"><label for="head3"><img
                                  class="subpic object-fit-cover"
                                  data-color="3"
                                  src="images/head/3.svg"
                                  alt=""
                                /></label>
                              </div>

                              <div class="pic mx-2"><input id="head4" type="radio" name="head" value="images/head/4.svg"><label for="head4"><img
                                  class="subpic object-fit-cover"
                                  data-color="4"
                                  src="images/head/4.svg"
                                  alt=""
                                /></label>
                              </div>

                              <div class="pic mx-2"><input id="head5" type="radio" name="head" value="images/head/5.svg"><label for="head5"><img
                                  class="subpic object-fit-cover"
                                  data-color="4"
                                  src="images/head/5.svg"
                                  alt=""
                                /></label>
                              </div>
                            </div>
                          </div>
                        <div class="col-8">
                          <table class="table">
                            <input type="hidden" name="id" value="<?=$row["user_id"]?>">
                            
                            <tr>
                                <th><span class="text-danger">*</span>姓名</th>
                                <td>
                                    <input class="form-control" type="text" name="name" value="<?= $row["user_name"]?>">
                                </td>
                                
                                
                            </tr>

                            <tr>
                                <th>生理性別(非必填)</th>
                                <td class="d-flex">
                                  <div class="form-check mr-5">
                                    <input <?php if($row["user_sex"]==0){echo "checked";} ?>class="form-check-input" type="radio" name="sex" id="sex" value=0>
                                    <label class="form-check-label" for="sex">
                                      生理男
                                    </label>
                                  </div>
                                  <div class="form-check mr-5">
                                    <input <?php if($row["user_sex"]==1){echo "checked";}?> class="form-check-input" type="radio" name="sex" id="sex" value=1>
                                    <label class="form-check-label" for="sex">
                                      生理女
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input <?php if($row["user_sex"]==2){echo "checked";}?> class="form-check-input" type="radio" name="sex" id="sex" value=2>
                                    <label class="form-check-label" for="sex">
                                      不填寫
                                    </label>
                                  </div>
                                </td>
                            </tr>

                            <tr>
                                <th>生日(非必填)</th>
                                <td class="d-flex">
                                  <label for="birth1" class="mr-5">
                                    <input id="birth1" type="radio" name="birth0" value="1" onclick="enableDateInput('.date1')">
                                    <input type="date" name="birth" class="date1" readonly>
                                      
                                  </label>

                                  <label for="birth2">
                                    <input id="birth2" type="radio" name="birth0" value=null onclick="removeDateInput('.date1')">
                                    不填寫  
                                  </label>

                                </td>
                            </tr>
            
                            <tr>
                                <th><span class="text-danger">*</span>信箱
                                </th>
                                <td><input class="form-control" type="text" name="email" value="<?= $row["user_email"]?>"></td>
                            </tr>
                            <tr>
                                <th><span class="text-danger">*</span>電話</th>
                                <td><input class="form-control" type="text" name="phone" value="<?= $row["user_phone"]?>"></td>
                            </tr>

                            
                            

                            <tr>
                                <th>地址(非必填)<br><small>若有填寫，未來將根據您的所在地，<br>更快速的推薦餐廳給您!</small></th>
                                <td>
                                  縣市
                                  <select class="form-select mainmenu" >
                                    <option selected>請選擇縣市</option>
                                    <option value="1">基隆市</option>
                                    <option value="2">台北市</option>
                                    <option value="3">新北市</option>
                                    <option value="4">桃園市</option>
                                    <option value="5">新竹市</option>
                                    <option value="6">新竹縣</option>
                                    <option value="7">苗栗縣</option>
                                    <option value="8">台中市</option>
                                    <option value="9">彰化縣</option>
                                    <option value="10">南投縣</option>
                                    <option value="11">雲林縣</option>
                                    <option value="12">嘉義市</option>
                                    <option value="13">嘉義縣</option>
                                    <option value="14">台南市</option>
                                    <option value="15">高雄市</option>
                                    <option value="16">屏東縣</option>
                                    <option value="17">宜蘭縣</option>
                                    <option value="18">花蓮縣</option>
                                    <option value="19">台東縣</option>
                                    <option value="20">澎湖縣</option>
                                    <option value="21">金門縣</option>
                                    <option value="22">連江縣</option>

                                    

                                  </select>
                                  區域
                                  <select class="form-select submenu">
                                    <option selected>請選擇鄉鎮市區</option>
                                    <?php foreach($rowsTaiwan as $rowTaiwan):?>
                                      <option value="<?= $$rowTaiwan["cities"]?>"><?= $$rowTaiwan["cities_name"]?></option>
                                    <?php endforeach;?>
                                    
                                    
                                  </select>
                                  詳細地址:
                                  <input class="form-control mt-3" type="text" name="address" value="">
                                  
                                </td>
                            </tr>

                            <tr>
                                <th>信用卡(非必填)<br><small>預設線上付款，結帳更快速!</small></th>
                                <td>
                                    <small>信用卡卡號</small>
                                    <input class="form-control" type="text" name="credit_card" value="<?= $row["credit_card"]?>">
                                    <div class="row">
                                      <div class="col-6">
                                        <small>到期日</small>
                                        <input class="form-control" type="text" name="valid-thru" value="<?= $row["valid_thru"]?>">
      
                                      </div>
                                      <div class="col-6">
                                        <small>安全碼</small>
                                        <input class="form-control" type="text" name="valid-thru" value="<?= $row["csc"]?>">
      
                                      </div>

                                    </div>
                                    
                                    
                                    
                                    
                                </td>
                            </tr>
                            
                          </table>
                          <?php
                          if(isset($_SESSION["error"]["message"])):?>
                          <div class="text-danger"><?php echo $_SESSION["error"]["message"] ?></div>
                          <?php endif;?>

                        </div>
                        

                      </div>

                      
                      <div class="p-3 d-flex justify-content-end">
                          <div>
                            <a class="btn btn-secondary text-white" href="user_index.php">取消</a>
                            <button class="btn btn-primary text-white" type="submit">
                                儲存
                            </button>
                          
                          
                          </div>
                          
                      </div>
                  </form>
                    
                  
                </div>
              </div>

              
              
            </div>

            <!-- Content Row -->
            
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Foodplatter &copy; 2023</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!--內容包裝結束-->
    </div>
    <!--頁尾包裝器-->

    <!--捲動到頂部按鈕-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!--註銷模式-->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- 選擇是否填日期 -->
    <script>
      function enableDateInput(inputId) {
          var dateInput = document.querySelector(inputId);
          
          if (dateInput) {
              dateInput.removeAttribute('readonly');
          }
          
      }

      function removeDateInput(removeId){
        var removeInput = document.querySelector(removeId);
        if (removeInput) {
            removeInput.setAttribute('readonly','true');
        }
      }
    </script>
    <!-- 下拉選單 -->
    <script>
      const mainMenu = document.querySelector(".mainmenu");
      const subMenu = document.querySelector(".submenu");
      
      mainMenu.addEventListener("change",function(){
        

      })
    </script>

    <!-- 下拉選單 -->
    <script>
      function updateSubMenu() {
            var mainMenu = document.querySelector(".mainmenu");
            var subMenu = document.querySelector(".submenu");

            // 清空次選單的內容
            subMenu.innerHTML = '';

            // 取得選擇的值
            var selectedValue = mainMenu.value;

            // 如果沒有選擇主選單，則直接返回
            if (!selectedValue) {
                return;
            }

            // 根據選擇的值取得對應的資料
            var data = citiesData[selectedValue];

            // 動態生成次選單的內容
            data.forEach(function (item) {
                addOption(subMenu, item);
            });
        }

        function addOption(selectElement, text) {
            var option = document.createElement('option');
            option.value = text;
            option.text = text;
            selectElement.add(option);
        }


      var citiesData={
        '1':[],
        '2':[],
        '3':[],
        '4':[],
        '5':[],
        '6':[],
        '7':[],
        '8':[],
        '9':[],
        '10':[],
        '11':[],
        '12':[],
        '13':[],
        '14':[],
        '15':[],
        '16':[],
        '17':[],
        '18':[],
        '19':[],
        '20':[],




      }

    </script>
    

      <!-- 變換圖片 -->
    <script>
        const mainpic=document.querySelector(".mainpic")
        const subpics=document.querySelectorAll(".subpic")

        console.log(subpics);
        console.log(subpics.length);
        for(let i=0;i<subpics.length;i++){
            // 事件監聽器
            subpics[i].addEventListener("click",function(){
                console.log("click");
                let imgUrl=subpics[i].src;
                // console.log(imgUrl);
                mainpic.src=imgUrl;
                
                

                // for(let j=0;j<subpics.length;j++){
                //     subpics[j].classList.remove("active")
                // }
                // (重要)點下去時先全部移除，再新增被點選的

                // this.classList.add("active");
                // 也可以寫:pics[i].classList.add("active");

            
            })
        }

        // for(let i=0;i<pics.length;i++){
        //     pic[i].addEventListener("click",function(){
                
        //     })
        // }

    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
  </body>
</html>
