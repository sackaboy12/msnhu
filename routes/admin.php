<?php
Route::group(['prefix' => 'admin','middleware' => 'auth'], function(){
    Route::get('/', 'SystemController@adminDash');

	Route::group(['prefix' => 'danhmuc'], function() {
		Route::group(['prefix' => 'sanpham'], function() {
		    Route::get('list','admin\DanhMucController@GetListDMSP');
	    	Route::get('create','admin\DanhMucController@GetTaoDMSP');
	    	Route::post('create','admin\DanhMucController@PostTaoDMSP');

	    	Route::group(['prefix' => 'edit'], function() {
		    	Route::get('{id}', 'admin\DanhMucController@GetEditDMSP');
		    	Route::post('{id}', 'admin\DanhMucController@PostEditDMSP');
		    });
		    Route::group(['prefix' => 'delete'], function() {
		    	Route::get('{id}/', 'admin\DanhMucController@GetXoaDMSP');
		    	//Route::get('{id}/config', 'admin\BaiVietController@unhiddenpost');
		    });

		}); // sanpham - danhmuc

		Route::group(['prefix' => 'bosuutap'], function() {
		    Route::get('list','admin\DanhMucController@GetListDM_BST');
	    	Route::get('create','admin\DanhMucController@GetTaoDM_BST');
	    	Route::post('create','admin\DanhMucController@PostTaoDM_BST');

	    	Route::group(['prefix' => 'edit'], function() {
		    	Route::get('{id}', 'admin\DanhMucController@GetEditDM_BST');
		    	Route::post('{id}', 'admin\DanhMucController@PostEditDM_BST');
		    });
		    Route::group(['prefix' => 'delete'], function() {
		    	Route::get('{id}/', 'admin\DanhMucController@GetXoaDM_BST');
		    	//Route::get('{id}/config', 'admin\BaiVietController@unhiddenpost');
		    });
		}); // bosuutap - danhmuc
	}); // end danhmuc

	Route::group(['prefix' => 'sanpham'],function(){
		Route::get('list','SanPhamController@GetList');
	    Route::get('create','SanPhamController@GetTaoSP');
	    Route::post('create','SanPhamController@PostTaoSP');

	    Route::group(['prefix' => 'delete'], function() {
	    	Route::get('{id}', 'SanPhamController@GetXoa');
	    });
	    Route::group(['prefix' => 'edit'], function() {
	    	Route::get('{id}', 'SanPhamController@GetEdit');
	    	Route::post('{id}', 'SanPhamController@PostEdit');
	    });
	}); //end sanpham

	Route::group(['prefix' => 'bosuutap'],function(){
		Route::get('list','BoSuuTapController@GetList');
	    Route::get('create','BoSuuTapController@GetTaoBST');
	    Route::post('create','BoSuuTapController@PostTaoBST');

	    Route::group(['prefix' => 'delete'], function() {
	    	Route::get('{id}', 'BoSuuTapController@GetXoaBTS');
	    });
	    Route::group(['prefix' => 'edit'], function() {
	    	Route::get('{id}', 'BoSuuTapController@GetEdit');
	    	Route::post('{id}', 'BoSuuTapController@PostEdit');
	    });
	}); //end bosuutap
	Route::group(['prefix' => 'tintuc'],function(){
		Route::get('list','BaiVietController@GetList');
	    Route::get('create','BaiVietController@GetTaoTinTuc');
	    Route::post('create','BaiVietController@PostTaoTinTuc');

	    Route::group(['prefix' => 'delete'], function() {
	    	Route::get('{id}', 'BaiVietController@GetXoaTinTuc');
	    });
	    Route::group(['prefix' => 'edit'], function() {
	    	Route::get('{id}', 'BaiVietController@GetEdit');
	    	Route::post('{id}', 'BaiVietController@PostEdit');
	    });
	}); //end tintuc
	Route::group(['prefix' => 'cauhoi'], function() {
    	Route::get('list','CauHoiController@GetList');
	    Route::get('create','CauHoiController@GetTaoCauHoi');
	    Route::post('create','CauHoiController@PostTaoCauHoi');

	    Route::group(['prefix' => 'delete'], function() {
	    	Route::get('{id}', 'CauHoiController@GetXoa');
	    });
	    Route::group(['prefix' => 'edit'], function() {
	    	Route::get('{id}', 'CauHoiController@GetEdit');
	    	Route::post('{id}', 'CauHoiController@PostEdit');
	    });
    });
    Route::group(['prefix' => 'slug'], function() {
    	Route::get('bai-viet-gioi-thieu','SlugController@GetBaiVietGioiThieu');
    	Route::post('bai-viet-gioi-thieu','SlugController@PostBaiVietGioiThieu');

    	Route::get('bai-viet-huong-dan','SlugController@GetBaiVietGioiThieu');
    	Route::post('bai-viet-huong-dan','SlugController@PostBaiVietGioiThieu');

    	Route::get('bai-viet-chinh-sach','SlugController@GetBaiVietGioiThieu');
    	Route::post('bai-viet-chinh-sach','SlugController@PostBaiVietGioiThieu');

    	Route::get('bai-viet-lien-he','SlugController@GetBaiVietGioiThieu');
    	Route::post('bai-viet-lien-he','SlugController@PostBaiVietGioiThieu');
    });

 //    Route::group(['prefix' => 'deal'], function() {
	// 	Route::get('/','SanPhamController@listdeal');
 //    	Route::get('create','SanPhamController@create_deal');
 //    	Route::post('create','SanPhamController@create_deal_post');
 //    	Route::post('add_deal','SanPhamController@add_sp_for_deal');

 //    	Route::group(['prefix' => 'delete','middleware' => 'rightMenQL'], function() {
	//     	Route::get('{id}/config', 'SanPhamController@deal_delete');
	//     	Route::get('{id}/config/delete', 'SanPhamController@deal_delete_config');
	//     });
	//     Route::group(['prefix' => 'edit'], function() {
	//     	Route::get('{id}', 'SanPhamController@deal_edit');
	//     	Route::post('{id}', 'SanPhamController@deal_edit_finish');
	//     });
	//     Route::group(['prefix' => 'view'], function() {
	//     	Route::get('{id}', 'SanPhamController@deal_view');
	//     	Route::post('{id}', 'SanPhamController@deal_view_post');
	    	
	//     });

 //    });


 //    Route::group(['prefix' => 'giftcode'], function() {
	// 	Route::any('list','SanPhamController@listgiftcode');
 //    	Route::get('create','SanPhamController@create_gift')->name('create_gift');
 //    	Route::post('create','SanPhamController@create_gift_post');
 //    	Route::post('add_deal','SanPhamController@add_sp_for_deal');

 //    	Route::group(['prefix' => 'delete','middleware' => 'rightMenQL'], function() {
	//     	Route::get('{id}/config', 'SanPhamController@giftcode_delete');
	//     	Route::get('{id}/config/delete', 'SanPhamController@giftcode_delete_config');
	//     });


 //    });
 //    Route::group(['prefix' => 'system','middleware' => 'rightAdmin'],function(){///
	// 	Route::get('cfn','SanPhamController@cfn');
	// 	Route::post('cfn','SanPhamController@cfnPost');

	// });

    
	// Route::group(['prefix' => 'sanpham','middleware' => 'rightMenC2'],function(){
	// 	Route::get('duyetsp','SanPhamController@duyetsp');
	// 	Route::get('duyetsp/{id}','SanPhamController@chitietduyetsp');
	// 	Route::post('duyetsp/{id}','SanPhamController@finish_chitietduyetsp');

	// 	Route::get('list','SanPhamController@list');
	// 	Route::get('filter','SanPhamController@filterlist');
	// 	Route::get('filter','SanPhamController@filterlistPost');
	//     Route::get('create','SanPhamController@showcreate');
	//     Route::post('create','SanPhamController@create');

	//     Route::group(['prefix' => 'delete','middleware' => 'rightMenQL'], function() {
	//     	Route::get('{id}/config', 'SanPhamController@configdelete');
	//     	Route::get('{id}/config/delete', 'SanPhamController@deletesp');
	//     });
	//     Route::group(['prefix' => 'edit'], function() {
	//     	Route::get('{id}', 'SanPhamController@editsp');
	//     	Route::post('{id}', 'SanPhamController@finish_editsp');
	//     });

	//     Route::group(['prefix' => 'giasp'], function() {
	//     	Route::get('edit/{id}', 'SanPhamController@edit_giasp');
	//     	Route::post('edit/{id}/oke', 'SanPhamController@finish_edit_giasp');

	//     	Route::get('delete/{id}', 'SanPhamController@delete_giasp');
	//     	Route::post('delete/{id}/oke', 'SanPhamController@finish_delete_giasp');

	//     	Route::get('add/{id}', 'SanPhamController@add_giasp');
	//     	Route::post('add/{id}', 'SanPhamController@finish_add_giasp');
	    	
	//     });

	//     Route::group(['prefix' => 'ver'], function() {
	//     	Route::get('add/{id}', 'SanPhamController@addlinksp');
	//     	Route::post('add/{id}', 'SanPhamController@finish_addlinksp');
	    	
	//     });
	// });//sanpham

	// Route::group(['prefix' => 'slide','middleware' => 'rightMenC2'], function() {
	// 	Route::get('list', 'SlideController@list');

 //    	Route::get('edit/{id}', 'SlideController@edit_slide');
 //    	Route::post('edit/{id}', 'SlideController@finish_edit_slide');

 //    	Route::get('delete/{id}/config', 'SlideController@delete_slide');
 //    	Route::post('delete/{id}', 'SlideController@finish_delete_slide');

 //    	Route::get('create', 'SlideController@showcreate');
 //    	Route::post('create', 'SlideController@create');
    	
 //    });

	// Route::group(['prefix' => 'shop','middleware' => 'rightMenC3'],function(){///
	// 	Route::get('list','ShopController@list');
	//     Route::get('create','ShopController@showcreate');
	//     Route::post('create','ShopController@create');

	//     Route::group(['prefix' => 'delete'], function() {
	//     	Route::get('{id}/config', 'ShopController@configdelete');
	//     	Route::get('{id}/config/delete', 'ShopController@deletedt');
	//     });
	//     Route::group(['prefix' => 'edit'], function() {
	//     	Route::get('{id}', 'ShopController@editdt');
	//     	Route::post('{id}', 'ShopController@finish_editdt');
	//     });

	// });
	// Route::group(['prefix' => 'attribute','middleware' => 'rightMenC3'],function(){///
	// 	Route::get('list','Attibute@GetList');
	//     Route::get('create','Attibute@GetCreate');
	//     Route::post('create','Attibute@PostCreate');

	//     Route::group(['prefix' => 'delete'], function() {
	//     	Route::get('{id}/config', 'Attibute@Getconfigdelete');
	//     	Route::get('{id}/config/delete', 'Attibute@Getdelete');
	//     });
	//     Route::group(['prefix' => 'edit'], function() {
	//     	Route::get('{id}', 'Attibute@Getedit');
	//     	Route::post('{id}', 'Attibute@Postedit');
	//     });

	// });

	// Route::group(['prefix' => 'order','middleware' => 'rightMenC3'],function(){///
	// 	Route::get('list','OrderController@GetList');
	//     Route::get('create','OrderController@GetCreate');
	//     Route::post('create','OrderController@PostCreate');

	//     Route::get('change_buy','OrderController@change_buy');
	    

	//     Route::group(['prefix' => 'delete'], function() {
	//     	Route::get('{id}/config', 'OrderController@Getconfigdelete');
	//     	Route::get('{id}/config/delete', 'OrderController@Getdelete');
	//     });
	//     Route::group(['prefix' => 'edit'], function() {
	//     	Route::get('{id}', 'OrderController@Getedit');
	//     	Route::post('{id}', 'OrderController@Postedit');
	//     });

	// });

	

	// Route::group(['prefix' => 'menber','middleware' => 'rightAdmin'],function(){///

 //    	Route::get('list','UserController@listmen');
 //    	Route::get('create',function(){
 //    		return view('admin.menber.create');
 //    	});
 //    	Route::post('create','UserController@register');
 //    	Route::group(['prefix' => 'delete'], function() {
	//     	Route::get('{id}/config', 'UserController@configdelete');
	//     	Route::get('{id}/config/delete', 'UserController@deleteuser');
	//     });
	//     Route::group(['prefix' => 'edit'], function() {
	//     	Route::get('{id}', 'UserController@edituser');
	//     	Route::post('{id}', 'UserController@finish_edituser');
	//     });
				    
	// });//menber


	// Route::group(['prefix' => 'user','middleware' => 'rightMenC2'],function(){///

 //    	Route::get('list','UserController@user_khachang');
				    
	// });//menber

	// Route::get('ajax/gamehacking/changeoption', 'AdminGameVerController@ajaxoption');
	// //Route::get('ajax/gamehacking/uploadfile/{id}', 'AdminGameVerController@ajaxuploadfile');
});


?>