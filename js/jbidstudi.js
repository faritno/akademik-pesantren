// //load
$(document).ready(function()
{
	// addSantri("TMI");
	setTable();
	$('.datepicker').datepicker(
	{
		rtl: App.isRTL(),
		orientation: "left",
		autoclose: true,
		format: 'dd-mm-yyyy'
    });

    $(".select2").select2();
    pilihItem();
	$('.numbers-only').keypress(function(event) {
		var charCode = (event.which) ? event.which : event.keyCode;
			if ((charCode >= 48 && charCode <= 57)
				|| charCode == 46
				|| charCode == 44
				|| charCode == 8)
				return true;
		return false;
	});

	//validasi form modal add_kecakapan_khusus
	$( "#add_bidstudi" ).validate({
		errorElement:"em",
		// errorClass:"help-block help-block-error",
			// rules:{
	    //    no_registrasi:{
	    //    minlength:2,
	    //    required:!0},
	    //    no_stambuk:{
	    //    required:!0}
			// },
			messages: {
				// no_registrasi: {
				// 	required: "(required)",
				// 	minlength: " (must be at least 3 characters)"
				// },
				email: "Email invalid"
			},

			invalidHandler: function(element, validator){
				validator.focusInvalid();
			},

			errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					$(element).closest(".form-group").addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "form-control" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$(element).closest(".form-group").addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$(element).closest(".form-group").addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}

	}); //end dari validasi form

});

function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		ajax: {
			'url':base_url+"bidstudi/load_grid",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		},
    } );
}

function Modalcari(){
	clearformcari();
	$('#Modal_cari').modal('show');
}

function SearchAction(){
    var id_bidang 	    = $('#s_id_bidang').val();
    var nama_bidang 	= $('#s_namalengkap').val();
	var param 			= {'id_bidang':id_bidang};
		param 			= JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#Modal_cari').modal('toggle');
}

function kosong(){
		$('#id_bidang').val('');
		$('#nama_bidang').val('');
}

function svbidstudi(){
	if($("#add_bidstudi").valid()==true){
        $id_bidang = $('#id_bidang').val();
		$status = $('#save_button').text();
		var str_url  	= encodeURI(base_url+"bidstudi/get_data_bidstudi/"+$id_bidang);
       $.ajax({
		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){	
            $data = $.parseJSON(data);
                if( $data != null & $status =='SAVE'){
                        bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SUDAH ADA DI DATABASE! </div>",
                            function(result){
                                if(result==true){
                                }
                            }
                        );
                    
                }
                else{
                    var iform = $('#add_bidstudi')[0];
                    var data = new FormData(iform);
                    if ($status == 'UPDATE')
                        {
                            msg="Update Data Berhasil"
                        }
                        else
                        {
                            msg="Simpan Data Berhasil"
                        }
                    $.ajax({

                        type:"POST",
                        url:base_url+"bidstudi/simpan_bidstudi/"+$status,
                        enctype: 'multipart/form-data',
                        // dataType:"JSON",
                        contentType: false,
                        processData: false,
                        data:data,
                        success:function(data){

                            bootbox.alert({
                                message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;"+msg+"!!",
                                size: 'small',
                                callback: function () {

                                    window.location = base_url+'bidstudi';
                                }
                            });
                        }
                    });
                }
            }
        });
	}
}

function OtomatisKapital(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

function addbidstudi(){
    kosong();
    // $('#spansearchclose').hide();
    // $('#hiddenidbid').hide();
    $('#save_button').text('SAVE');	
    // $('#status').val('1');
	$('#Modal_add_bidstudi').modal('show');
}

function ONprosses(){

	bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SEDANG DALAM PENGERJAAN! </div>",
		function(result){
			if(result==true){

			}
		}
	);
}

function edit(id_bidang){
	var str_url  	= encodeURI(base_url+"bidstudi/get_data_bidstudi/"+id_bidang);
    $('#save_button').text('UPDATE');
    $('#id_bidang').attr('readonly',true);
	$.ajax({

		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){
			
			var data = $.parseJSON(data);
			$('#id_bidang').val(data['id_bidang']);
		    $('#nama_bidang').val(data['nama_bidang']);
            
			
			$('#Modal_add_bidstudi').modal('show');
			
			
		}
	});
	
}

function hapus(id_bidang){
	var str_url  	= encodeURI(base_url+"bidstudi/Delbidstudi/"+id_bidang);
	bootbox.confirm("Anda yakin akan menghapus "+id_bidang+" ini ?",
		function(result){
			if(result==true){
				
			$.ajax({
			type:"POST",
			url:str_url,
			dataType:"html",
			success:function(data){
					bootbox.alert({
						message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Hapus Berhasil Berhasil",
						size: 'small',
						callback: function () {

							window.location = base_url+'bidstudi';
						}
					});
				}
			});
			}
		}
	);
	
}

function clearformcari(){
	$('#s_id_bidang').val('');
	// $('#s_namalengkap').val('');
}

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'bidstudi/exportexcel/'+param;
}

