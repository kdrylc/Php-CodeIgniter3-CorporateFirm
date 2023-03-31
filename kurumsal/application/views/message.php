<!--TOP HEADER-->
<?php $this->load->view("top-header"); ?>
<!--TOP HEADER BİTİŞ-->

<style>
    .switch {

        position: relative;

        display: inline-block;

        width: 60px;

        height: 34px;

    }

    .switch input {

        opacity: 0;

        width: 0;

        height: 0;

    }

    .slider {

        position: absolute;

        cursor: pointer;

        top: 0;

        left: 0;

        right: 0;

        bottom: 0;

        background-color: #ccc;

        -webkit-transition: .4s;

        transition: .4s;

    }

    .slider:before {

        position: absolute;

        content: "";

        height: 26px;

        width: 26px;

        left: 4px;

        bottom: 4px;

        background-color: white;

        -webkit-transition: .4s;

        transition: .4s;

    }

    input:checked + .slider {

        background-color: #2196F3;

    }

    input:focus + .slider {

        box-shadow: 0 0 1px #2196F3;

    }

    input:checked + .slider:before {

        -webkit-transform: translateX(26px);

        -ms-transform: translateX(26px);

        transform: translateX(26px);

    }

    /* Rounded sliders */

    .slider.round {

        border-radius: 34px;

    }

    .slider.round:before {

        border-radius: 50%;

    }
</style>

<div class="wrapper">

    <!--HEADER-->
    <?php $this->load->view("header"); ?>
    <!--HEADER BİTİŞ-->

    <!--SİDEBAR-->
    <?php $this->load->view("sidebar"); ?>
    <!--SİDEBAR BİTİŞ-->


    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Mesaj Listesi</h4>

                                </div>
                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover text-center" >
                                        <thead>
                                        <tr>
                                            <th><i class="fas fa-exchange-alt"></i></th>
                                            <th>#</th>
                                            <th>İsim</th>
                                            <th>Mail</th>
                                            <th>Telefon</th>
                                            <th>Konu</th>
                                            <th>Durum</th>
                                            <th style="width: 10%">İşlem</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><i class="fas fa-exchange-alt"></i></th>
                                            <th>#</th>
                                            <th>İsim</th>
                                            <th>Mail</th>
                                            <th>Telefon</th>
                                            <th>Konu</th>
                                            <th>Durum</th>
                                            <th>İşlem</th>
                                        </tr>
                                        </tfoot>

                                        <tbody id="sortable" >

                                        <?php if ($message){
                                            foreach ($message as $mess){?>

                                                <tr id="rank-<?php echo $mess->id;?>">
                                                    <td><i class="fas fa-exchange-alt"></td>
                                                    <td><?php echo $mess->id;?></td>
                                                    <td><i class="<?php echo $mess->name;?> fa-2x"></i></td>
                                                    <td><?php echo $mess->mail;?></td>
                                                    <td><?php echo $mess->phone;?></td>
                                                    <td><?php echo $mess->subject;?></td>

                                                  <td>
                                                        <label class="switch">
                                                            <input type="checkbox" data-url="<?php echo base_url("message/isactivesetter/$mess->id");?>" id="isActive" <?php echo ($mess->reply_status == 1)? "checked" :"";?>>
                                                            <span class="slider"></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <div class="form-button-action">
                                                            <button type="button" data-toggle="modal" data-target="#updateRowModal<?php echo $mess->id;  ?>" class="btn btn-primary btn-sm mx-1" data-original-title="Düzenle">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button data-url="message/delete/<?php echo $mess->id;?>" data-toggle="tooltip"  class="btn btn-danger remove-btn btn-sm mx-1" data-original-title="Sil">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade" id="updateRowModal<?php echo $mess->id;  ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg " role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header no-bd">
                                                                <h5 class="modal-title">
														<span class="fw-mediumbold">
														Gelen Mesaj Okuyorsunuz</span>
                                                                    <span class="fw-light">

														</span>
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="small">Gelen mesajlarınızı, okuyorsunuz...</p>
                                                                <form action="message/reply/<?php echo $mess->id;  ?>" method="POST" enctype="multipart/form-data">
                                                                    <div class="row">

                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>İsim</label>
                                                                                <input id="addPosition" type="text" name="name" class="form-control" value="<?php echo $mess->name;  ?> "readonly>
                                                                            </div>
                                                                        </div>



                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Mail</label>
                                                                                <input id="addPosition" type="text" name="mail" class="form-control" value="<?php echo $mess->mail;  ?>"readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Telefon</label>
                                                                                <input id="addPosition" type="text" name="phone" class="form-control" value="<?php echo $mess->phone;  ?>"readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Konu</label>
                                                                                <input id="addPosition" type="text" name="subject" class="form-control" value="<?php echo $mess->subject;  ?>"readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12 ">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Gelen Mesaj</label>

                                                                                <textarea  name="content" rows="5" class="form-control"><?php echo $mess->content;  ?></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12 ">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Gelen Mesajı Cevapla (<?php echo $mess->mail;  ?>)</label>

                                                                                <textarea  name="reply" class="ckeditor"></textarea>
                                                                            </div>
                                                                        </div>




                                                                    </div>
                                                            <div class="modal-footer no-bd">
                                                                <button type="submit"  class="btn btn-primary">Cevapla</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php }

                                        }else{?>

                                            <tr><td colspan="8">Herhangi bir veri bulunamadı.</td></tr>

                                        <?php }?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--FOOTER-->
        <?php $this->load->view("footer"); ?>
        <!--FOOTER BİTİŞ-->

    </div>

    <!-- Custom template | don't include it in your project! -->
    <!--<div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
            <div class="switcher">
                <div class="switch-block">
                    <h4>Logo Header</h4>
                    <div class="btnSwitch">
                        <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
                        <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                        <br/>
                        <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Navbar Header</h4>
                    <div class="btnSwitch">
                        <button type="button" class="changeTopBarColor" data-color="dark"></button>
                        <button type="button" class="changeTopBarColor" data-color="blue"></button>
                        <button type="button" class="changeTopBarColor" data-color="purple"></button>
                        <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                        <button type="button" class="changeTopBarColor" data-color="green"></button>
                        <button type="button" class="changeTopBarColor" data-color="orange"></button>
                        <button type="button" class="changeTopBarColor" data-color="red"></button>
                        <button type="button" class="changeTopBarColor" data-color="white"></button>
                        <br/>
                        <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                        <button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
                        <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                        <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                        <button type="button" class="changeTopBarColor" data-color="green2"></button>
                        <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                        <button type="button" class="changeTopBarColor" data-color="red2"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Sidebar</h4>
                    <div class="btnSwitch">
                        <button type="button" class="selected changeSideBarColor" data-color="white"></button>
                        <button type="button" class="changeSideBarColor" data-color="dark"></button>
                        <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Background</h4>
                    <div class="btnSwitch">
                        <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                        <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                        <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                        <button type="button" class="changeBackgroundColor" data-color="dark"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-toggle">
            <i class="flaticon-settings"></i>
        </div>
    </div> -->
    <!-- End Custom template -->
</div>

<!--BOTTOM FOOTER-->
<?php $this->load->view("bottom-footer"); ?>
<!--BOTTOM FOOTER BİTİŞ-->
