<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;} th{text-align: center;}</style>
<script src="<?php echo base_url(); ?>js/jguru.js"></script>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green-jungle">
        <div class="portlet-title">
                <div class="caption">
                    <i class="icon-user"></i>&nbsp;<span><?php echo $title;?></span>
                </div>
                <div class="tools">
                  <div class="btn-group pull-right">
                      
                  </div>
                </div>
                <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                    <button class="btn btn-default " type="button" data-toggle="dropdown" onclick="modalNew()">
                        <i class="icon-note"></i>&nbsp;Tambah Data&nbsp;
                    </button>                    
                    <button type="button" class="btn btn-default" title="Search Data" onclick="Modalcari()">
                        <i class="fa fa-search"></i>&nbsp;Search
                    </button>
                    <button type="button" class="btn btn-default" title="Export Data to Excel" onclick="downloadExcel()">
                        <i class="fa fa-file-excel-o"></i>&nbsp;Excel
                    </button>
                </div>
            </div>
            <input type="hidden" name="hid_param" id="hid_param" />
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tb_list">
                    <thead>
                        <tr>
                            <th>No.Registrasi</th>
                            <th>Nama Lengkap</th>
                            <th>NIG</th>
                            <th>Mulai Mengajar</th>
                            <th>Gender</th>
                            <th>Status</th>                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td colspan="7" align="center">Tidak ada data ditemukan.</td></tr>
                    </tbody>                    
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<!-- MODAL EDITING FORM -->
    <div class="modal fade draggable-modal" id="modal_editing" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header ">
                    <div class="btn pull-right" >
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                     <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green" id="save_button_header" onclick="svSantri()">Simpan changes</button>
                    <button type="button" class="btn blue" id="addto_button_header" onclick="AddTOSantri()">Jadikan Santri</button>
                    </div>
                </div>
                <div class="modal-body"> 
                    <!--Modal body goes here -->
                    <form action="#" id="add_santri" class="form-horizontal" enctype="multipart/form-data">
                        <!--kotak data santri mulai-->
                        <div class="portlet box green-jungle">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>DATA SANTRI </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <div class="form-body">
                                        <h3 class="form-section">Data Pribadi</h3>
                                        <!--row begin-->
                                        <!--inputbbox-->
                                        <div class="m-grid m-grid-responsive-xs">
                                            <div class="m-grid-row">
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-1">
                                                    <div class="form-group ">
                                                        <!--<label class="control-label col-md-3"></label>
                                                        <div class="col-md-9">-->
                                                            <div class="fileinput fileinput-new" data-provides="fileinput" >
                                                            <div class="fileinput-preview thumbnail" data-trigger="fileinputs" style="float:left;width:200px;position:relative;padding:5px;" id="image-holder"> </div>
                                                                <div>
                                                                    <span class="btn red btn-outline btn-file" id="button_photo">
                                                                        <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                        <input type="file" id="fileUpload" name="fileUpload"> </span>
                                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput" > Remove </a>
                                                                </div>
                                                                <input type="hidden"  id="TfileUpload" name="TfileUpload">
                                                            </div>
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="form-section"></h3>
                                        <div class="m-grid m-grid-responsive-xs">
                                            <div class="m-grid-row">
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-1">
                                                    <div class="form-group"><label for="form_control_1">Kategori</label>
                                                        <select class="form-control" name="kategori_santri" id="kategori_santri" required onchange="cek_kt()">
                                                                    <option value=""></option>
                                                                    <option value="TMI">TMI</option>
                                                                    <option value="AITAM_ISLAH">AITAM_ISLAH</option>
                                                                    <option value="AITAM_JAMIAH">AITAM_JAMIAH</option>
                                                                </select>
                                                        
                                                    </div>
                                                    <input type="hidden" name="kategori_update" id="kategori_update" />
                                                </div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-2">
                                                    <div class="form-group"><label for="no_registrasi">No. Registrasi</label>
                                                        <input type="text" class="form-control" readonly name="no_registrasi" id="no_registrasi" onkeydown="OtomatisKapital(this)" >
                                                        
                                                    </div>
                                                </div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-1">
                                                    <div class="form-group"> <label for="form_control_1">No. Stambuk</label>
                                                        <input type="text" class="form-control numbers-only"  name="no_stambuk" id="no_stambuk" readonly >
                                                        
                                                    </div>
                                                </div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-1">
                                                    <div class="form-group"><label for="form_control_1">Tahun Masuk</label>
                                                        <input type="text" class="form-control datepicker" readonly name="thn_masuk" id="thn_masuk" required>
                                                        
                                                        </div>
                                                </div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-2">
                                                    <div class="form-group"> 
                                                    <label for="form_control_1">Gedung 
                                                        <span class="glyphicon glyphicon-search"
                                                            style="cursor: pointer;"
                                                            title="Cari Kode Gedung"
                                                            id="spansearchgedung"
                                                           onclick="idgedungshow()">  
                                                        </span>
                                                        <span class="glyphicon glyphicon-remove-sign"
                                                            style="cursor: pointer;"
                                                            title="Cari Kode Gedung"
                                                            id="spansearchclosegedung"
                                                           onclick="idgedunghide()">  
                                                        </span>
                                                    </label>
                                                    <div class="input" id= "hiddenidgedung">
                                                            <?php
                                                                $att_item = 'id="hide_id_gedung"  class="form-control select2" style="width:100%"  onchange="pilihItemGedung()"';
                                                                echo form_dropdown('hide_id_gedung', $kode_gedung, null, $att_item);
                                                            ?>
                                                        </div>
                                                        
                                                        <input type="text" class="form-control" readonly name="rayon" id="rayon" onkeydown="OtomatisKapital(this)" required>
                                                        
                                                    </div>
                                                </div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-2">
                                                    <div class="form-group"><label for="form_control_1">Kamar
                                                     <span class="glyphicon glyphicon-search"
                                                            style="cursor: pointer;"
                                                            title="Cari Kode Kamar"
                                                            id="spansearchKamar"
                                                           onclick="idKamarshow()">  
                                                        </span>
                                                        <span class="glyphicon glyphicon-remove-sign"
                                                            style="cursor: pointer;"
                                                            title="Cari Kode Kamar"
                                                            id="spansearchcloseKamar"
                                                           onclick="idKamarhide()">  
                                                        </span>
                                                    </label>
                                                    <div class="input" id= "hiddenidKamar">
                                                            <?php
                                                                $att_item = 'id="hide_id_Kamar"  class="form-control select2" style="width:100%"  onchange="pilihItemKamar()"';
                                                                echo form_dropdown('hide_id_Kamar', $kode_kamar, null, $att_item);
                                                            ?>
                                                        </div>
                                                        <input type="text" class="form-control" readonly name="kamar" id="kamar" onkeydown="OtomatisKapital(this)" required>
                                                        
                                                    </div>
                                                </div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-2">
                                                    <div class="form-group"><label for="form_control_1">Bagian</label>
                                                        <input type="text" class="form-control" readonly name="bagian" id="bagian" onkeydown="OtomatisKapital(this)" required>
                                                        
                                                    </div>
                                                </div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-1">
                                                    <div class="form-group"> <label for="form_control_1">Kelas
                                                      <span class="glyphicon glyphicon-search"
                                                            style="cursor: pointer;"
                                                            title="Cari Kode Kelas"
                                                            id="spansearchKelas"
                                                           onclick="idKelasshow()">  
                                                        </span>
                                                        <span class="glyphicon glyphicon-remove-sign"
                                                            style="cursor: pointer;"
                                                            title="Cari Kode Kelas"
                                                            id="spansearchcloseKelas"
                                                           onclick="idKelashide()">  
                                                        </span>
                                                    </label>
                                                    <div class="input" id= "hiddenidKelas">
                                                            <?php
                                                                $att_item = 'id="hide_id_Kelas"  class="form-control select2" style="width:100%"  onchange="pilihItemKelas()"';
                                                                echo form_dropdown('hide_id_Kelas', $kode_kelas, null, $att_item);
                                                            ?>
                                                        </div></label>
                                                        <input type="text" class="form-control" readonly name="kel_sekarang" id="kel_sekarang" onkeydown="OtomatisKapital(this)" required>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            NISN
                                                        </span>
                                                        <input type="text" class="form-control numbers-only" name="nisn" id="nisn" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            NISN LOKAL
                                                        </span>
                                                        <input type="text" class="form-control numbers-only" name="nisnlokal" id="nisnlokal" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Nama Lengkap
                                                        </span>
                                                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Nama Arab
                                                        </span>
                                                        <input type="text" class="form-control" name="nama_arab" id="nama_arab" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Nama Panggilan
                                                        </span>
                                                    <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Hobi
                                                        </span>
                                                    <input type="text" class="form-control" name="hobi" id="hobi" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                            <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Uang Jajan Perbulan
                                                        </span>
                                                    <input type="text" class="form-control" name="uang_jajan_perbulan" id="uang_jajan_perbulan" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Nomor KK
                                                        </span>
                                                    <input type="text" class="form-control numbers-only" name="no_kk" id="no_kk" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            NIKK
                                                        </span>
                                                    <input type="text" class="form-control numbers-only" name="nik" id="nik" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Tempat Lahir
                                                        </span>
                                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                            <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Tgl. Lahir
                                                        </span>
                                                    <input type="text" class="form-control datepicker" readonly="true" name="tgl_lahir" id="tgl_lahir" required><span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                           Konsulat
                                                        </span>
                                                    <input type="text" class="form-control" name="konsulat" id="konsulat" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                            <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                           Suku
                                                        </span>
                                                    <input type="text" class="form-control" name="suku" id="suku" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                           Kewarganegaraan
                                                        </span>
                                                    <input type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                            <h3 class="form-section">Alamat</h3>
                                            <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                           Jalan/Kompleks
                                                        </span>
                                                <input type="text" class="form-control" name="jalan" id="jalan" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                           No Rumah, RT, RW
                                                        </span>
                                                    <input type="text" class="form-control" name="no_rumah" id="no_rumah" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                         <div class="input-group">
                                                        <span class="input-group-addon">
                                                           Dusun/Kampung
                                                        </span>
                                                    <input type="text" class="form-control" name="dusun" id="dusun" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                         <div class="input-group">
                                                        <span class="input-group-addon">
                                                           Desa/Kelurahan
                                                        </span>
                                                    <input type="text" class="form-control" name="desa" id="desa" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                           Kecamatan
                                                        </span>
                                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                           Kabupaten/Kota
                                                        </span>
                                                    <input type="text" class="form-control" name="kabupaten" id="kabupaten" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                            <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                           Provinsi
                                                        </span>
                                                    <input type="text" class="form-control" name="provinsi" id="provinsi" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                          Kode Pos
                                                        </span>
                                                    <input type="text" class="form-control numbers-only" name="kd_pos" id="kd_pos" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                          No Telepon
                                                        </span>
                                                    <input type="text" class="form-control numbers-only" name="no_tlp" id="no_tlp" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                          No HP
                                                        </span>
                                                    <input type="text" class="form-control numbers-only" name="no_hp" id="no_hp" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                          E-Mail
                                                        </span>
                                                    <input type="email" class="form-control" name="email" id="email" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                          Facebook
                                                        </span>
                                                    <input type="text" class="form-control" name="fb" id="fb" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                          Dibesarkan Di
                                                        </span>
                                                    <input type="text" class="form-control" name="dibesarkan_di" id="dibesarkan_di" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--/row-->
                                </div>
                                <!-- END FORM-->
                            </div>
                        </div>
                        <!--kotak data santri selesai-->
                        <!--kotak data Pembiayaan mulai-->
                        <div class="portlet box green-jungle">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>DATA PEMBIAYAAN</div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <div class="form-body">
                                                    <h3 class="form-section">Pembiaya</h3>
                                                    <!--row begin-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                          Yang Membiayai
                                                        </span>
                                                            <select class="form-control" name="pembiaya" id="pembiaya" onchange="cek_jk()" required>
                                                                <option value=""></option>
                                                                <option value="AYAH">AYAH</option>
                                                                <option value="IBU">IBU</option>
                                                                <option value="WALI">WALI</option>
                                                                <option value="SAUDARA">SAUDARA</option>
                                                            </select></div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Penghasilan Perbulan
                                                                    </span>
                                                                <input type="text" class="form-control" name="penghasilan" id="penghasilan" onkeydown="OtomatisKapital(this)" required></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Minimum Pengeluaran
                                                                    </span>
                                                                <input type="text" class="form-control" name="biaya_perbulan_min" id="biaya_perbulan_min" required></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Maximum Pengeluaran
                                                                    </span>
                                                                <input type="text" class="form-control" name="biaya_perbulan_max" id="biaya_perbulan_max" required></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--/row-->
                                                </div>
                                        </div>
                                    </div>
                        <!--kotak data pembiayaan selesai-->
                        <!--kotak data sekolah mulai-->
                        <div class="portlet box green-jungle" id="kotak_sekolah">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i> DATA SEKOLAH (AITAM)</div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <div class="form-body">
                                                    <h3 class="form-section">Sekolah</h3>
                                                    <!--row begin-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Nama Sekolah
                                                                    </span>
                                                                <input type="text" class="form-control" name="nama_sekolah_aitam" id="nama_sekolah_aitam" onkeydown="OtomatisKapital(this)" required></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Kelas
                                                                    </span>
                                                                <input type="text" class="form-control" name="kelas_aitam" id="kelas_aitam" onkeydown="OtomatisKapital(this)" required></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                     <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Alamat Sekolah
                                                                    </span>
                                                                <input type="text" class="form-control" name="alamat_sekolah_aitam" id="alamat_sekolah_aitam" onkeydown="OtomatisKapital(this)" required></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--/row-->
                                                </div>

                                            <!-- END FORM-->
                                        </div>
                                    </div>
                        <!--kotak data sekolah end-->
                        <!--kotak data fisik mulai-->
                        <div class="portlet box green-jungle">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i> DATA FISIK</div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <div class="form-body">
                                                    <h3 class="form-section">Fisik</h3>
                                                    <!--row begin-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Golongan Darah
                                                                    </span>
                                                                <select class="form-control" name="gol_darah" id="gol_darah" required>
                                                                    <option value=""></option>
                                                                    <option value="A">A</option>
                                                                    <option value="B">B</option>
                                                                    <option value="A/B">A/B</option>
                                                                    <option value="O">O</option>
                                                                    <option value="TIDAK TAHU">TIDAK TAHU</option>
                                                                </select></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Tinggi Badan (cm)
                                                                    </span>
                                                                        <input type="text" class="form-control numbers-only" name="tinggi_badan" id="tinggi_badan"maxlength="3"  required></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Khitan
                                                                    </span>
                                                                    <select class="form-control" name="khitan" id="khitan" required>
                                                                    <option value=""></option>
                                                                    <option value="SUDAH">SUDAH</option>
                                                                    <option value="BELUM">BELUM</option>
                                                                    </select></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Berat Badan (kg)
                                                                    </span>
                                                                        <input type="text" class="form-control numbers-only" name="berat_badan" id="berat_badan" maxlength="3" required></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Pengelihatan Mata
                                                                    </span>
                                                                    <select class="form-control" name="pengelihatan_mata" id="pengelihatan_mata" required>
                                                                    <option value=""></option>
                                                                    <option value="BAIK">BAIK</option>
                                                                    <option value="SEDANG">SEDANG</option>
                                                                    <option value="KURANG">KURANG</option>
                                                                </select></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Pakai Kaca Mata
                                                                    </span>
                                                                <select class="form-control" name="kaca_mata" id="kaca_mata" required>
                                                                    <option value=""></option>
                                                                    <option value="TIDAK">TIDAK</option>
                                                                    <option value="YA">YA</option>
                                                                </select></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Pendengaran Telingan
                                                                    </span>
                                                                    <select class="form-control" name="pendengaran" id="pendengaran" required>
                                                                    <option value=""></option>
                                                                    <option value="BAIK">BAIK</option>
                                                                    <option value="SEDANG">SEDANG</option>
                                                                    <option value="KURANG">KURANG</option>
                                                                </select></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Kelainan Fisik
                                                                    </span>
                                                                    <input type="text" class="form-control" name="kelainan_fisik" id="kelainan_fisik" onkeydown="OtomatisKapital(this)" required></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                   Operasi
                                                                    </span>
                                                                <select class="form-control" name="operasi" id="operasi" required>
                                                                    <option value=""></option>
                                                                    <option value="TIDAK">TIDAK</option>
                                                                    <option value="PERNAH">PERNAH</option>
                                                                </select></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Sebab
                                                                    </span>
                                                                <input type="text" class="form-control" name="sebab" id="sebab" onkeydown="OtomatisKapital(this)" required></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                   Kecelakaan
                                                                    </span>
                                                                <select class="form-control" name="kecelakaan" id="kecelakaan" required>
                                                                    <option value=""></option>
                                                                    <option value="TIDAK">TIDAK</option>
                                                                    <option value="PERNAH">PERNAH</option>
                                                                </select></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                   Akibat
                                                                    </span>
                                                                    <input type="text" class="form-control" name="akibat" id="akibat" onkeydown="OtomatisKapital(this)" required></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Alergi
                                                                    </span>
                                                                <input type="text" class="form-control" name="alergi" id="alergi" onkeydown="OtomatisKapital(this)" required></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Dari Tahun
                                                                    </span>
                                                                    <input type="text" class="form-control datepicker" readonly name="thn_fisik" id="thn_fisik" required></div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    <!--end inputbox-->
                                                    <h3 class="form-section">Lingkungan Rumah</h3>
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"> </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Kondisi Pendidikan
                                                                    </span>
                                                <select class="form-control" name="kondisi_pendidikan" id="kondisi_pendidikan" required>
                                                            <option value=""></option>
                                                            <option value="KETAT">KETAT</option>
                                                            <option value="SEDANG">SEDANG</option>
                                                            <option value="BEBAS">BEBAS</option>
                                                        </select></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Ekonomi Keluarga
                                                                    </span>
                                                    <select class="form-control" name="ekonomi_keluarga" id="ekonomi_keluarga" required>
                                                            <option value=""></option>
                                                            <option value="MAMPU">MAMPU</option>
                                                            <option value="CUKUP">CUKUP</option>
                                                            <option value="KURANG">KURANG</option>
                                                        </select></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"> </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Situasi Rumah
                                                                    </span>
                                                    <select class="form-control" name="situasi_rumah" id="situasi_rumah" required>
                                                            <option value=""></option>
                                                            <option value="PERKOTAAN">PERKOTAAN</option>
                                                            <option value="PEDESAAN">PEDESAAN</option>
                                                            <option value="PERKAMPUNGAN">PERKAMPUNGAN</option>
                                                        </select></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Dekat Dengan
                                                                    </span>
                                                    <select class="form-control" name="dekat_dengan" id="dekat_dengan" required>
                                                            <option value=""></option>
                                                            <option value="MASJID">MASJID</option>
                                                            <option value="SEKOLAH">SEKOLAH</option>
                                                            <option value="PASAR">PASAR</option>
                                                            <option value="PABRIK">PABRIK</option>
                                                            <option value="MALL">MALL</option>
                                                        </select></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3"> </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Hidup Beragama
                                                                    </span>
                                                    <select class="form-control" name="hidup_beragama" id="hidup_beragama" required>
                                                            <option value=""></option>
                                                            <option value="BAIK">BAIK</option>
                                                            <option value="SEDANG">SEDANG</option>
                                                            <option value="KURANG">KURANG</option>
                                                        </select></div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        <!--end inputbox-->
                                                    <!--/row-->
                                            </div>
                                        <!-- END FORM-->
                                        </div>
                                    </div>
                        <!--kotak data Fisik End-->
                        <!--kotak data Keluarga mulai-->
                        <div class="portlet box green-jungle">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> DATA KELUARGA </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i></a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <div class="form-body">
                                    <h3 class="form-section">
                                        <button type="button" class="btn red" id="button_keluarga" onclick="modalAddkeluarga()" required>
                                            <i class="fa fa-plus"> </i> Tambah Keluarga / Wali / Saudara
                                            </h3>
                                    <!--row begin-->
                                            <input type="hidden" id="hid_jumlah_item_keluarga" value="0" />
                                            <input type="hidden" name="hid_table_item_Keluarga" id="hid_table_item_Keluarga" />
                                            <input type="hidden" id="hid_cek_ayah" value="0" />
                                            <input type="hidden" id="hid_cek_ibu" value="0" />
                                            <input type="hidden" id="hid_cek_wali" value="0" />
                                                <div class="portlet-body table-both-scroll">
                                                    <div class="table-responsive">
                                                        <table id="tb_list_keluarga" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th> No.</th>
                                                                    <th> Kategori</th>
                                                                    <th> Nama </th>
                                                                    <th> NIK </th>
                                                                    <th> Bin/Binti </th>
                                                                    <th> Jenis Kelamin </th>
                                                                    <th> Status Pernikahan </th>
                                                                    <th> Tgl. Wafat </th>
                                                                    <th> Umur </th>
                                                                    <th> Hari </th>
                                                                    <th> Sebab Wafat </th>
                                                                    <th> Status Perkawinan Ibu </th>
                                                                    <th> Pendapatan Ibu </th>
                                                                    <th> Sebab Tidak Bekerja </th>
                                                                    <th> Keahlian </th>
                                                                    <th> Status Rumah </th>
                                                                    <th> Kondisi Rumah </th>
                                                                    <th> Jumlah Yang diasuh </th>
                                                                    <th> Pekerjaan </th>
                                                                    <th> Pendidikan Terakhir </th>
                                                                    <th> Agama </th>
                                                                    <th> Suku </th>
                                                                    <th> Kewarganegaraan </th>
                                                                    <th> Ormas </th>
                                                                    <th> Orpol </th>
                                                                    <th> Kedudukan diMasyarakat </th>
                                                                    <th> Tahun Lulus </th>
                                                                    <th> No. Stambuk </th>
                                                                    <th> Tempat Lahir </th>
                                                                    <th> Tgl. Lahir </th>
                                                                    <th> Hubungan Keluarga </th>
                                                                    <th> Keterangan </th>
                                                                    <th> Ktp </th>
                                                                </tr>
                                                            </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="31" align="center">
                                                                            Belum Ada Data.
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <!--<tfoot>
                                                                    <tr>
                                                                    </tr>
                                                                </tfoot>-->
                                                        </table>
                                                    </div>
                                                </div>
                                    <!--/row-->
                                </div>
                            <!-- END FORM-->
                            </div>
                        </div>
                        <!--kotak data Keluarga End-->
                        <!--kotak data Penyakit mulai-->
                        <div class="portlet box green-jungle">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> DATA PENYAKIT </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i></a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <div class="form-body">
                                    <h3 class="form-section">
                                        <button type="button" class="btn red" id="button_penyakit" onclick="modalAddPenyakit()" required>
                                            <i class="fa fa-plus"> </i> Tambah List Penyakit
                                        </button></h3>
                                    <!--row begin-->
                                        <input type="hidden" id="hid_jumlah_item_penyakit" value="0" />
                                        <input type="hidden" name="hid_table_item_penyakit" id="hid_table_item_penyakit" />
                                            <div class="portlet-body table-both-scroll">
                                            <div class="table-responsive">
                                            <table id="tb_list_penyakit" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> No</th>
                                                        <th> Nama Penyakit</th>
                                                        <th> Tahun</th>
                                                        <th> Kategori Penyakit </th>
                                                        <th> Tipe Penyakit </th>
                                                        <th> Lampiran </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="6" align="center">
                                                        Belum Ada Data.
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                    <!--<tfoot>
                                                        <tr>
                                                        </tr>
                                                    </tfoot>-->
                                            </table>
                                        </div>
                                        </div>                            
                                    <!--/row-->
                                </div>
                            <!-- END FORM-->
                            </div>
                        </div>
                        <!--kotak data Penyakit End-->
                    <!--kotak data kecakapan khusu mulai-->
                        <div class="portlet box green-jungle">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> DATA KECAKAPAN KHUSUS </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i></a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <div class="form-body">
                                    <h3 class="form-section">
                                        <button type="button" class="btn red" id="button_kecakapankhusus" onclick="modalAddKecakapanKhusus()">
                                            <i class="fa fa-plus"> </i> Tambah List Kecakapan Khusus
                                        </button></h3>
                                    <!--row begin-->
                                    <input type="hidden" id="hid_jumlah_item_KecakapanKhusus" value="0" />
                                    <input type="hidden" name="hid_table_item_KecakapanKhusus" id="hid_table_item_KecakapanKhusus" />
                                            <div class="portlet-body table-both-scroll">
                                                <div class="table-responsive">
                                                <table id="tb_list_kckhusus" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th> No </th>
                                                            <th> Bidang Studi </th>
                                                            <th> Olahraga </th>
                                                            <th> Kesenian </th>
                                                            <th> Keterampilan </th>
                                                            <th> Lain-Lain </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td colspan="6" align="center">
                                                            Belum Ada Data.
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                        <!--<tfoot>
                                                            <tr>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                        </tfoot>-->
                                                </table>
                                            </div>
                                            </div>                           
                                    <!--/row-->
                                </div>
                            <!-- END FORM-->
                            </div>
                        </div>
                    <!--kotak data kecakapan khusus End-->
                    <!--kotak data lampiran mulai-->
                        <div class="portlet box green-jungle">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i> DATA LAMPIRAN </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i></a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <div class="form-body">
                                    <!--row begin-->
                                        <div class="row">
                                        <!--inputbbox-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                        <label class="control-label col-md-3">Ijazah/ Raport Kelas Terakhir</label>
                                                        <div class="col-md-3">
                                                           <div class="fileinput fileinput-new" data-provides="fileinput" id="button_ijazah">
                                                            <div class="input-group input-large">
                                                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                    <span class="fileinput-filename"> </span>
                                                                </div>
                                                                <span class="input-group-addon btn default btn-file">
                                                                    <span class="fileinput-new"> Select file </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file"  id="fileUpload_ijazah" name="fileUpload_ijazah"> </span>
                                                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_ijazah" name="RfileUpload_ijazah"> Remove </a>
                                                            </div>
                                                        </div>
                                                         <div class="cijazah" id="ijazahholder"><a href="LINKTARGET" target="_blank"> <button type="button" class="btn dark btn-outline" >lihat ijazah</button></a></div>
                                                         <input type="hidden"  id="TfileUpload_ijazah" name="TfileUpload_ijazah">
                                                        </div>
                                                    </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                        <label class="control-label col-md-3"> Akta Kelahiran </label>
                                                        <div class="col-md-3">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput" id="button_akelahiran">
                                                            <div class="input-group input-large">
                                                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                    <span class="fileinput-filename"> </span>
                                                                </div>
                                                                <span class="input-group-addon btn default btn-file">
                                                                    <span class="fileinput-new"> Select file </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file"  id="fileUpload_akelahiran" name="fileUpload_akelahiran"> </span>
                                                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_akelahiran" name="RfileUpload_akelahiran"> Remove </a>
                                                            </div>
                                                        </div>
                                                         <div class="cakelahiran" id="aklahiranholder"><a href="LINKTARGET" target="_blank"> <button type="button" class="btn dark btn-outline" >lihat akte</button></a></div>
                                                         <input type="hidden"  id="TfileUpload_akelahiran" name="TfileUpload_akelahiran">
                                                        </div>
                                                    </div>
                                            </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3"> Kartu Keluarga </label>
                                                            <div class="col-md-3">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput" id="button_kk">
                                                                    <div class="input-group input-large">
                                                                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                            <span class="fileinput-filename"> </span>
                                                                        </div>
                                                                        <span class="input-group-addon btn default btn-file">
                                                                            <span class="fileinput-new"> Select file </span>
                                                                            <span class="fileinput-exists"> Change </span>
                                                                            <input type="file"  id="fileUpload_kk" name="fileUpload_kk"> </span>
                                                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_kk" name="RfileUpload_kk"> Remove </a>
                                                                    </div>
                                                                </div>
                                                                <div class="ckk" id="kkholder"><a href="LINKTARGET" target="_blank"> <button type="button" class="btn dark btn-outline" >lihat kk</button></a></div>
                                                                <input type="hidden"  id="TfileUpload_kk" name="TfileUpload_kk">
                                                            </div>
                                                        </div>
                                                </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3"> SKHUN </label>
                                                    <div class="col-md-3">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput" id="button_skhun">
                                                            <div class="input-group input-large">
                                                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                    <span class="fileinput-filename"> </span>
                                                                </div>
                                                                <span class="input-group-addon btn default btn-file">
                                                                    <span class="fileinput-new"> Select file </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file"  id="fileUpload_skhun" name="fileUpload_skhun"> </span>
                                                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_skhun" name="RfileUpload_skhun"> Remove </a>
                                                            </div>
                                                        </div>
                                                        <div class="cskhun" id="skhunholder"><a href="LINKTARGET" target="_blank"> <button type="button" class="btn dark btn-outline" >lihat skhun</button></a></div>
                                                        <input type="hidden"  id="TfileUpload_skhun" name="TfileUpload_skhun">
                                                    </div>
                                                </div>
                                            </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3"> Transkip Nilai </label>
                                                    <div class="col-md-3">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput" id="button_transkip">
                                                            <div class="input-group input-large">
                                                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                    <span class="fileinput-filename"> </span>
                                                                </div>
                                                                <span class="input-group-addon btn default btn-file">
                                                                    <span class="fileinput-new"> Select file </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file"  id="fileUpload_transkip" name="fileUpload_transkip"> </span>
                                                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_transkip" name="RfileUpload_transkip"> Remove </a>
                                                            </div>
                                                        </div>
                                                         <div class="ctranskip" id="transkipholder"><a href="LINKTARGET" target="_blank"> <button type="button" class="btn dark btn-outline" >lihat transkip nilai</button></a></div>
                                                         <input type="hidden"  id="TfileUpload_transkip" name="TfileUpload_transkip">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3"> SKBB </label>
                                                    <div class="col-md-3">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput" id="button_skbb">
                                                            <div class="input-group input-large">
                                                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                    <span class="fileinput-filename"> </span>
                                                                </div>
                                                                <span class="input-group-addon btn default btn-file">
                                                                    <span class="fileinput-new"> Select file </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file"  id="fileUpload_skbb" name="fileUpload_skbb"> </span>
                                                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_skbb" name="RfileUpload_skbb"> Remove </a>
                                                            </div>
                                                        </div>
                                                        <div class="cskbb" id="skbbholder"><a href="LINKTARGET" target="_blank"> <button type="button" class="btn dark btn-outline" >lihat skbb</button></a></div>
                                                        <input type="hidden"  id="TfileUpload_skbb" name="TfileUpload_skbb">
                                                    </div>
                                                </div>
                                            </div> <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">  Surat Kesehatan </label>
                                                    <div class="col-md-3">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput" id="button_skes">
                                                            <div class="input-group input-large">
                                                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                    <span class="fileinput-filename"> </span>
                                                                </div>
                                                                <span class="input-group-addon btn default btn-file">
                                                                    <span class="fileinput-new"> Select file </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file"  id="fileUpload_skes" name="fileUpload_skes"> </span>
                                                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_skes" name="RfileUpload_skes"> Remove </a>
                                                            </div>
                                                        </div>
                                                        <div class="cskes" id="skesholder"><a href="LINKTARGET" target="_blank"> <button type="button" class="btn dark btn-outline" >lihat Surat Kesehatan</button></a></div>
                                                         <input type="hidden"  id="TfileUpload_skes" name="TfileUpload_skes">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end inputbox-->
                                        </div>
                                        <!--/row-->                                   
                                    </div>
                                    <!-- END FORM-->
                                </div>
                            </div>
                    <!--kotak data data lampiran End-->
                        </div><!--modal-body end-->
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green" id="save_button_footer" onclick="svSantri()">Simpan changes</button>
                    <button type="button" class="btn blue" id="addto_button_footer" onclick="AddTOSantri()">Jadikan Santri</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- END MODAL EDITING FORM -->
  
<!-- modal add KELUARGA -->
    <div class="modal fade bs-modal-lg" id="Modal_add_keluarga_santri" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <!--<h4 class="modal-title">Start Dragging Here</h4>-->
                </div>
                <div class="modal-body">
                     <!-- isi body modal mulai -->
              <div class="row">
    <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">INPUT DATA KELUARGA/WALI/SAUDARA</span>
                </div>
            </div>
            <div class="portlet-body">
                    <!-- BEGIN FORM-->
                <form action="#" id="add_keluarga_santri">
                    <div class="form-body">
                            <!--inputbbox-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Kategori
                                            </span>
                                        <select class="form-control" name="kategori_keluarga" id="kategori_keluarga" onchange="cek_jk()" required>
                                            <option value=""></option>
                                            <option value="AYAH">AYAH</option>
                                            <option value="IBU">IBU</option>
                                            <option value="WALI">WALI</option>
                                            <option value="SAUDARA">SAUDARA</option>
                                        </select></div>
                                        <span class="help-block">Pilih Keluarga (Ayah, Ibu, Wali, Saudara)</span>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Nama
                                            </span>
                                        <input type="text" class="form-control" name="nama_keluarga" id="nama_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                    <span class="help-block">Masukan Nama Lengkap</span>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                NIK
                                            </span>
                                        <input type="text" class="form-control numbers-only" name="nik_keluarga" id="nik_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                                        <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Bin/Binti
                                            </span>
                                    <input type="text" class="form-control" name="binbinti_keluarga" id="binbinti_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Jenis Kelamin
                                            </span>
                                            <select class="form-control" name="jenis_kelamin_keluarga" id="jenis_kelamin_keluarga" required>
                                            <option value=""></option>
                                            <option value="LAKI-LAKI">LAKI-LAKI</option>
                                            <option value="PEREMPUAN">PEREMPUAN</option>
                                        </select></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Status
                                            </span>
                                        <select class="form-control" name="status_pernikahan_keluarga" id="status_pernikahan_keluarga" required>
                                        <option value=""></option>
                                        <option value="MENIKAH">MENIKAH</option>
                                        <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                                        <option value="JANDA/DUDA">JANDA/DUDA</option>
                                        <option value="WAFAT">WAFAT</option>
                                    </select></div>
                                    <span class="help-block">Status Pernikahan</span>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Tgl. Wafat
                                            </span>
                                    <input type="text" class="form-control datepicker" readonly="true" name="tgl_wafat_keluarga" id="tgl_wafat_keluarga" required><span class="input-group-btn">
                                        <button class="btn default" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Umur
                                            </span>
                                    <input type="text" class="form-control numbers-only" name="umur_keluarga" id="umur_keluarga" maxlength="3" required></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Hari
                                            </span>
                                    <input type="text" class="form-control" name="hari_keluarga" id="hari_keluarga" onkeydown="OtomatisKapital(this)" required> </div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Sebab Wafat
                                            </span>
                                    <input type="text" class="form-control" name="sebab_wafat_keluarga" id="sebab_wafat_keluarga" onkeydown="OtomatisKapital(this)" required> </div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Status Pernikahan Ibu
                                            </span>
                                    <select class="form-control" name="status_perkawinan_ibu_keluarga" id="status_perkawinan_ibu_keluarga" required>
                                        <option value=""></option>
                                        <option value="JANDA">JANDA</option>
                                        <option value="MENIKAH LAGI">MENIKAH LAGI</option>
                                        <option value="WAFAT">WAFAT</option>
                                    </select> </div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Pendapatan Ibu
                                            </span>
                                    <input type="text" class="form-control" name="pedapatan_ibu_keluarga" id="pedapatan_ibu_keluarga" required></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Sebab Tidak Bekerja
                                            </span>
                                    <input type="text" class="form-control" name="sebab_tidak_bekerja_keluarga" id="sebab_tidak_bekerja_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Keahlian
                                            </span>
                                    <input type="text" class="form-control" name="keahlian_keluarga" id="keahlian_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Status Rumah
                                            </span>
                                        <select class="form-control" name="status_rumah_keluarga" id="status_rumah_keluarga" required>
                                        <option value=""></option>
                                        <option value="KONTRAK">KONTRAK</option>
                                        <option value="MILIK SENDIRI">MILIK SENDIRI</option>
                                    </select></div>
                                    <span class="help-block">Status Pernikahan</span>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Kondisi Rumah
                                            </span>
                                        <select class="form-control" name="kondisi_rumah_keluarga" id="kondisi_rumah_keluarga" required>
                                        <option value=""></option>
                                        <option value="PERMANEN">PERMANEN</option>
                                        <option value="SEDERHANA">SEDERHANA</option>
                                        <option value="SANGAT SEDERHANA">SANGAT SEDERHANA</option>
                                    </select></div>
                                    <span class="help-block">Status Pernikahan</span>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Jumlah yang diasuh
                                            </span>
                                    <input type="text" class="form-control numbers-only" name="jml_asuh" id="jml_asuh" maxlength="3"  required></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Pekerjaan
                                            </span>
                                        <input type="text" class="form-control" name="pekerjaan_keluarga" id="pekerjaan_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Pendidikan Terakhir
                                            </span>
                                            <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" required>
                                                <option value=""></option>
                                                <option value="TK">TK</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP/SLTA">SMP/SLTA</option>
                                                <option value="SMA/SMK">SMA/SMK</option>
                                                <option value="DIPLOMA">DIPLOMA</option>
                                                <option value="SARJANA">SARJANA</option>
                                                <option value="MAGISTER">MAGISTER</option>
                                                <option value="DOKTOR">DOKTOR</option>
                                            </select></div>
                                </div>
                            </div>
                                <!--span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Agama
                                            </span>
                                                <input type="text" class="form-control" name="agama_keluarga" id="agama_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                    </div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Nomor KK
                                            </span>
                                                <input type="text" class="form-control numbers-only" name="suku_keluarga" id="suku_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                    </div>
                                </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Kewarganegaraan
                                            </span>
                                                <input type="text" class="form-control" name="kewarganegaraan_keluarga" id="kewarganegaraan_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                 </div>
                            </div>
                        </div>
                                <!--span-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Ormas
                                            </span>
                                                <input type="text" class="form-control" name="ormas_keluarga" id="ormas_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                    </div>
                                </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Orpol
                                            </span>
                                                <input type="text" class="form-control" name="orpol_keluarga" id="orpol_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                            Kedudukan dimasyarakat
                                            </span>
                                                <input type="text" class="form-control" name="kedudukandimasyarakat_keluarga" id="kedudukandimasyarakat_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                    </div>
                                </div>
                            </div>
                                <!--span-->
                                <h3 class="form-section">Alumni TMI Darussalam</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                            Tahun Lulus
                                            </span>
                                                <input type="text" class="form-control datepicker" data-date-format="yyyy" readonly="true" name="tahun_lulus_keluarga" id="tahun_lulus_keluarga" required ><span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                            No. Stambuk
                                            </span>
                                                <input type="text" class="form-control numbers-only" name="nostambuk_keluarga" id="nostambuk_keluarga" required></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                            Tempat Lahir
                                            </span>
                                                <input type="text" class="form-control" name="tempat_lahir_keluarga" id="tempat_lahir_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                            Tgl. Lahir
                                            </span>
                                                <input type="text" class="form-control datepicker" readonly="true" name="tgl_lahir_keluarga" id="tgl_lahir_keluarga" required><span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                            Hubungan Keluarga
                                            </span>
                                                <input type="text" class="form-control" name="hubungan_keluarga" id="hubungan_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                            keterangan
                                            </span>
                                                <input type="text" class="form-control" name="keterangan_keluarga" id="keterangan_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"></label>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                        KTP
                                        </span>
                                        <input type="file" class="form-control" name="ktp_keluarga" id="ktp_keluarga" required></div>
                                    </div>
                                </div>
                            </div>
                                <!--span-->
                            <!--end inputbox-->
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                            <button type="button" class="btn green" onclick="TambahKeluarga()">Tambah</button>
                        </div>
                    </div>
                </form>
                    <!-- END FORM-->
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    </div>
                </div><!--end modal-body-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
 
<!-- end of modal keluarga-->

<!-- modal add PENYAKIT -->
    <div class="modal fade draggable-modal" id="Modal_add_penyakit" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <!--<h4 class="modal-title">Start Dragging Here</h4>-->
                </div>
                <div class="modal-body">
                     <!-- isi body modal mulai -->
                    <div class="row">
                        <div class="col-md-12">
                                <!-- BEGIN VALIDATION STATES-->
                                <div class="portlet light portlet-fit portlet-form bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-red"></i>
                                            <span class="caption-subject font-red sbold uppercase">INPUT DATA PENYAKIT</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="form-body">                                        
                                            <!-- BEGIN FORM-->
                                            <form action="#" id="add_penyakit">                                    
                                                <!--inputbox-->
                                                    <!--span-->
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Nama Penyakit
                                                                </span>
                                                                <input type="text" class="form-control" name="nama_penyakit" id="nama_penyakit" onkeydown="OtomatisKapital(this)" required minlength="5"></div>
                                                        </div>      
                                                        <!--span-->
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Tahun
                                                            </span>
                                                            <input type="text" class="form-control datepicker" data-date-format="yyyy" name="thn_penyakit" id="thn_penyakit" required readonly="true"><span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span></div>
                                                        </div>    
                                                        <!--span-->
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Kategori Penyakit
                                                            </span>
                                                            <select class="form-control" name="kategori_penyakit" id="kategori_penyakit" required>
                                                                <option value=""></option>
                                                                <option value="KRONIS">KRONIS</option>
                                                                <option value="TIDAK KRONIS">TIDAK KRONIS</option>
                                                            </select></div>
                                                        </div>    
                                                        <!--span-->
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Tipe Penyakit
                                                                </span>
                                                                <select class="form-control" name="tipe_penyakit" id="tipe_penyakit" required>
                                                                    <option value=""></option>
                                                                    <option value="MENULAR">MENULAR</option>
                                                                    <option value="TIDAK MENULAR">TIDAK MENULAR</option>
                                                                </select></div>
                                                        </div>    
                                                        <!--span-->
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Lampiran Bukti Penyakit
                                                            </span>
                                                            <input type="file" class="form-control" name="lamp_bukti" id="lamp_bukti" required></div>
                                                        </div>                                     
                                                <!--end inputbox-->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn green" onclick="TambahPenyakit()">Tambah</button>
                                                </div>
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                </div><!-- END VALIDATION STATES-->
                        </div>
                    </div>
                </div><!--end modal-body-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- end of modal penyakit-->
<!-- modal add KECAKAPAN KHUSUS -->
    <div class="modal fade draggable-modal" id="Modal_add_KecakapanKhusus" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <!--<h4 class="modal-title">Start Dragging Here</h4>-->
                </div>
                <div class="modal-body">
                     <!-- isi body modal mulai -->
                    <div class="row">
                        <div class="col-md-12">
                        <!-- BEGIN VALIDATION STATES-->
                        <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">INPUT DATA KECAPAKAN KHUSUS</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_kecakapan_khusus">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Bidang Studi
                                                            </span>
                                                            <input type="text" class="form-control" name="bid_studi" id="bid_studi" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Olah Raga
                                                        </span>
                                                        <input type="text" class="form-control" name="olahraga" id="olahraga" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>     
                                                <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Kesenian
                                                        </span>
                                                        <input type="text" class="form-control" name="kesenian" id="kesenian" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>  
                                                <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Keterampilan
                                                        </span>
                                                        <input type="text" class="form-control" name="keterampilan" id="keterampilan" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>  
                                                <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Lain-Lain
                                                        </span>
                                                        <input type="text" class="form-control" name="lain_lain" id="lain_lain" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>                                  
                                            <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green" onclick="TambahKecakapanKhusus()">Tambah</button>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                        </div>
                        <!-- END VALIDATION STATES-->
                        </div>
                    </div>
                </div><!--end modal-body-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- end of modal Kecakapan Khusus-->
<!-- modal Cari -->
    <div class="modal fade draggable-modal" id="Modal_cari" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <!--<h4 class="modal-title">Start Dragging Here</h4>-->
                </div>
                <div class="modal-body">
                     <!-- isi body modal mulai -->
                    <div class="row">
                        <div class="col-md-12">
                        <!-- BEGIN VALIDATION STATES-->
                        <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Form Cari</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="form_cari">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Noregistrasi
                                                            </span>
                                                            <input type="text" class="form-control" name="s_noregistrasi" id="s_noregistrasi" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                <!--span-->
                                                    <!-- <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Nama Lengkap
                                                        </span>
                                                        <input type="text" class="form-control" name="s_namalengkap" id="s_namalengkap" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>      -->
                                            <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green" onclick="SearchAction()">Search</button>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                        </div>
                        <!-- END VALIDATION STATES-->
                        </div>
                    </div>
                </div><!--end modal-body-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- end of modal cari-->
