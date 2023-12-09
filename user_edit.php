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

// 各縣市資料轉換
$sqlTaipei="SELECT * FROM cities
WHERE cities < 117";
$resultTaipei=$conn->query($sqlTaipei);
$rowTaipei=$resultTaipei->fetch_all(MYSQLI_ASSOC);


$sqlNewTaipei="SELECT * FROM cities
WHERE 206 < cities && cities < 254";
$resultNewTaipei=$conn->query($sqlNewTaipei);
$rowNewTaipei=$resultNewTaipei->fetch_all(MYSQLI_ASSOC);

$sqlKeelung="SELECT * FROM cities
WHERE 199 < cities && cities < 206";
$resultKeelung=$conn->query($sqlKeelung);
$rowKeelung=$resultKeelung->fetch_all(MYSQLI_ASSOC);

$sqlKeelung="SELECT * FROM cities
WHERE 200 < cities && cities < 206";
$resultKeelung=$conn->query($sqlKeelung);
$rowKeelung=$resultKeelung->fetch_all(MYSQLI_ASSOC);

$sqlYilan="SELECT * FROM cities
WHERE 259 < cities && cities < 291";
$resultYilan=$conn->query($sqlYilan);
$rowYilan=$resultYilan->fetch_all(MYSQLI_ASSOC);

$sqlHsinchu="SELECT * FROM cities
WHERE 301 < cities && cities < 316";
$resultHsinchu=$conn->query($sqlHsinchu);
$rowHsinchu=$resultHsinchu->fetch_all(MYSQLI_ASSOC);

$sqlHsinchuCity="SELECT * FROM cities
WHERE cities === 300";
$resultHsinchuCity=$conn->query($sqlHsinchuCity);
$rowHsinchuCity=$resultHsinchuCity->fetch_all(MYSQLI_ASSOC);

$sqlTaoyan="SELECT * FROM cities
WHERE 319 < cities && cities < 339";
$resultTaoyan=$conn->query($sqlTaoyan);
$rowTaoyan=$resultTaoyan->fetch_all(MYSQLI_ASSOC);

$sqlMiaoli="SELECT * FROM cities
WHERE 349 < cities && cities < 370";
$resultMiaoli=$conn->query($sqlMiaoli);
$rowMiaoli=$resultMiaoli->fetch_all(MYSQLI_ASSOC);

$sqlTaichung="SELECT * FROM cities
WHERE 399 < cities && cities < 440";
$resultTaichung=$conn->query($sqlTaichung);
$rowTaichung=$resultTaichung->fetch_all(MYSQLI_ASSOC);

$sqlChanghua="SELECT * FROM cities
WHERE 499 < cities && cities < 531";
$resultChanghua=$conn->query($sqlChanghua);
$rowChanghua=$resultChanghua->fetch_all(MYSQLI_ASSOC);

$sqlNantou="SELECT * FROM cities
WHERE 539 < cities && cities < 559";
$resultNantou=$conn->query($sqlNantou);
$rowNantou=$resultNantou->fetch_all(MYSQLI_ASSOC);

$sqlChiayi="SELECT * FROM cities
WHERE 601 < cities && cities < 626";
$resultChiayi=$conn->query($sqlChiayi);
$rowChiayi=$resultChiayi->fetch_all(MYSQLI_ASSOC);

$sqlChiayiCity="SELECT * FROM cities
WHERE cities === 600";
$resultChiayiCity=$conn->query($sqlChiayiCity);
$rowChiayiCity=$resultChiayiCity->fetch_all(MYSQLI_ASSOC);

$sqlYunlin="SELECT * FROM cities
WHERE 629 < cities && cities < 656";
$resultYunlin=$conn->query($sqlYunlin);
$rowYunlin=$resultYunlin->fetch_all(MYSQLI_ASSOC);

$sqlTainan="SELECT * FROM cities
WHERE 699 < cities && cities < 746";
$resultTainan=$conn->query($sqlTainan);
$rowTainan=$resultTainan->fetch_all(MYSQLI_ASSOC);

$sqlKaohsiung="SELECT * FROM cities
WHERE 799 < cities && cities < 853";
$resultKaohsiung=$conn->query($sqlKaohsiung);
$rowKaohsiung=$resultKaohsiung->fetch_all(MYSQLI_ASSOC);

$sqlPenghu="SELECT * FROM cities
WHERE 879 < cities && cities < 886";
$resultPenghu=$conn->query($sqlPenghu);
$rowPenghu=$resultPenghu->fetch_all(MYSQLI_ASSOC);

$sqlPingtung="SELECT * FROM cities
WHERE 899 < cities && cities < 948";
$resultPingtung=$conn->query($sqlPingtung);
$rowPingtung=$resultPingtung->fetch_all(MYSQLI_ASSOC);

$sqlTaitung="SELECT * FROM cities
WHERE 949 < cities && cities < 967";
$resultTaitung=$conn->query($sqlTaitung);
$rowTaitung=$resultTaitung->fetch_all(MYSQLI_ASSOC);

$sqlHualiang="SELECT * FROM cities
WHERE 969 < cities && cities < 984";
$resultHualiang=$conn->query($sqlHualiang);
$rowHualiang=$resultHualiang->fetch_all(MYSQLI_ASSOC);

$sqlKinmen="SELECT * FROM cities
WHERE 889 < cities && cities < 897";
$resultKinmen=$conn->query($sqlKinmen);
$rowKinmen=$resultKinmen->fetch_all(MYSQLI_ASSOC);

$sqlLianjiang="SELECT * FROM cities
WHERE 208 < cities && cities < 213";
$resultLianjiang=$conn->query($sqlLianjiang);
$rowLianjiang=$resultLianjiang->fetch_all(MYSQLI_ASSOC);

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
            <a class="btn btn-primary" href="login.php">登出</a>
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
          href="index.html"
        >
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="bi bi-slack"></i>
          </div>
          <div class="sidebar-brand-text mx-3">foodplatter</div>
        </a>
        
        <!-- 會員頭貼 -->
        <img
          class="img-profile rounded-circle m-5"
          src="<?= $row["user_img"] ?>"
        />

        <hr class="sidebar-divider my-0" />

        <!-- nav -->
        <li class="nav-item active">
          <a class="nav-link" href="user_index.html">
            
            <span><i class="bi bi-house"></i>會員資料</span>
          </a>
        </li>

        <hr class="sidebar-divider" />
        
        <li class="nav-item">
          <a class="nav-link" href="user_order.html">
            
            <span><i class="bi bi-file-earmark"></i>訂單</span></a
          >
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="user_coupon.html">
            
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
                    >Hello!<?= $row["user_name"]?></span
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
                  
                  <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                  >
                    <h6 class="m-0 font-weight-bold text-primary">
                      會員資料修改
                    </h6>
                    
                  </div>
                  
                  <div class="card-body row">

                    <!-- 大頭貼 -->
                    <div class="col-4">
                      <h6 class="pt-5">頭貼</h6>

                      <div class="justify-content-center d-flex">
                        
                        <img
                          class="img-profile rounded-circle mainpic"
                          src="<?= $row["user_img"] ?>"/>
                      </div>
                      

                      <h6 class="pt-5">點擊即可變換頭貼</ㄋ>

                      <div class="thumb d-flex justify-content-around my-3">
                        <div class="subpic pic mx-2"><img
                          class="object-fit-cover"
                          data-color="1"
                          src="images/head/1.svg"
                          alt=""
                        />
                      </div>
                      <div class="subpic pic mx-2"><img
                          class="object-fit-cover"
                          data-color="2"
                          src="images/head/2.svg"
                          alt=""
                        />
                      </div>
                      <div class="subpic pic mx-2"><img
                          class="object-fit-cover"
                          data-color="3"
                          src="images/head/3.svg"
                          alt=""
                        />
                      </div><div class="subpic pic mx-2"><img
                          class="object-fit-cover"
                          data-color="4"
                          src="images/head/4.svg"
                          alt=""
                        />
                      </div>

                      <div class="subpic pic mx-2"><img
                          class="object-fit-cover"
                          data-color="4"
                          src="images/head/5.svg"
                          alt=""
                        />
                      </div>
                    </div>

                  </div>

                    

                  <!-- 會員資訊修改 -->
                  <form class="col-8" action="" method="post">
                    <table class="table">
                        <input type="hidden" name="id" value="">
                        
                        <tr>
                            <th>姓名</th>
                            <td>
                                <input class="form-control" type="text" name="name" value="<?= $row["user_name"]?>">
                            </td>
                            <?=
                            var_dump($rowKeelung)?>
                        </tr>

                        <tr>
                            <th>生理性別(非必填)</th>
                            <td class="d-flex">
                              <div class="form-check mr-5">
                                <input class="form-check-input" type="radio" name="sex" id="sex" value=0>
                                <label class="form-check-label" for="sex">
                                  生理男
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="sex" value=1>
                                <label class="form-check-label" for="sex">
                                  生理女
                                </label>
                              </div>
                            </td>
                        </tr>

                        <tr>
                            <th>生日(非必填)</th>
                            <td>
                              <input type="date" class="form-control" name="birth" value="<?= $row["user_birth"]?>">
                            </td>
                        </tr>
        
                        <tr>
                            <th>信箱
                            </th>
                            <td><input class="form-control" type="text" name="email" value="<?= $row["user_email"]?>"></td>
                        </tr>
                        <tr>
                            <th>電話</th>
                            <td><input class="form-control" type="text" name="phone" value="<?= $row["user_phone"]?>"></td>
                        </tr>

                        <tr>
                            <th>密碼</th>
                            <td>
                                <input class="form-control" type="text" name="password" value="<?= $row["password"]?>">
                            </td>
                        </tr>

                        <tr>
                          <th>確認密碼</th>
                          <td>
                              <input class="form-control" type="text" name="password" value="">
                          </td>
                      </tr>
                        

                        <tr>
                            <th>地址(非必填)<br><small>若有填寫，未來將根據您的所在地，<br>更快速的推薦餐廳給您!</small></th>
                            <td>
                              縣市
                              <select class="form-select" aria-label="Default select example">
                                <option selected>請選擇縣市</option>
                                <option value="1">基隆市</option>
                                <option value="2">台北市</option>
                                <option value="3">新北市</option>
                                <option value="4">桃園市</option></option>
                                <option value="5">新竹市</option>
                                <option value="6">新竹縣</option>
                                <option value="7">苗栗縣</option>
                                <option value="8">台中市</option>
                                <option value="9">彰化縣</option>
                                <option value="10">雲林縣</option>
                                <option value="11">嘉義縣</option>
                                <option value="12">台南市</option>
                                <option value="13">高雄市</option>
                                <option value="14">屏東縣</option>
                                <option value="15">宜蘭縣</option>
                                <option value="16">花蓮縣</option>
                                <option value="17">台東縣</option>
                                <option value="18">澎湖縣</option>
                                <option value="19">金門縣</option>
                                <option value="20">馬祖縣</option>
                                

                              </select>
                              區域
                              <select class="form-select" aria-label="Default select example">
                                <option selected>請選擇鄉鎮市區</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
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
                    <div class="py-2 d-flex justify-content-end">
                        <div>
                          <a class="btn btn-secondary text-white" href="index.html">取消</a>
                          <button class="btn btn-primary text-white" type="submit">
                              儲存
                          </button>
                        
                        
                        </div>
                        
                    </div>
                </form>
                    
                  </div>
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
    <!-- 下拉選單 -->
    <script>
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
                let imgUrl=subpics[i].childNodes[0].src;
                console.log(imgUrl);
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
