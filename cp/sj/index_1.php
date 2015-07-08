<!DOCTYPE html>
<head>
<?php include('headerinclude.php'); ?>
</head>
<body>
<?php $current = "home";?>
<?php include('nav.php'); ?>

<?php

include_once dirname(__FILE__) . "/include/function.php";

$strSQL = "SELECT * FROM data ";
$DB = new myDB;
$DB->query($strSQL);

				
	
	?>					
							<ol class="opc" id="checkoutSteps">
						    <li id="opc-billing" class="section active">
							<div class="step-title">						            
						            <h2>test</h2>
						            
						    </div>	
							<div id="checkout-step-billing" class="step a-item" style="display:block;">
								<ul class="form-list">
<?php
							while($data = $DB->fetch_array($DB->res)) {	
?>								
									<li class="fields">
											<div class="field">
												<!--<label for="TotalOrderAmount">value</label>-->
												<div class="input-box">
													<?php  
													if($data["varchr_value"] !='')
													echo $data["varchr_value"];
													else if ( $data["num_value"]>0)
													echo $data["num_value"];													
													else if ($data["date_value"] >0)
													echo date('Y-m-d',strtotime($data["date_value"]));													
													else if ($data["text_value"] !='')
													echo $data["text_value"];
													?>
												</div>
											</div>
											
									</li>
<?php
								}
				$DB->close();								
?>																		
								</ul>
							</div>
							
							</ol>

					</div>


<h2>Customer</h2>
<form>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>구매자</th>
                <th>연락처</th>
                <th>등록일</th>
                <th>입금자</th>
                <th>수령자</th>
                <th>우편번호</th>
                <th>배송주소</th>
                <th>수령자연락처</th>
                <th>판매일자</th>
                <th>판매회사</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="customername" class="form-control" />
                </td>
                <td>
                    <input type="text" name="contact" class="form-control" />
                </td>
                <td>
                    <input type="datetime" name="regdate" class="form-control" />
                </td>
                <td>
                    <input type="datetime" name="saledate" class="form-control" />
                </td>
                <td>
                    <input type="text" name="payername" class="form-control" />
                </td>
                <td>
                    <input type="text" name="receivername" class="form-control" />
                </td>
                <td>
                    <input type="text" name="zipcode" class="form-control" />
                </td>
                <td>
                    <input type="text" name="shipaddress" class="form-control" />
                </td>
                <td>
                    <input type="text" name="rcvcontact" class="form-control" />
                </td>
                
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="10">
                    <input type="submit" value="등록" />
                </td>
            </tr>
        </tfoot>
    </table>
</form>
<table class="table table-responsive table-hover">
    <thead>
        <tr>
            <th>구매자 정보</th>
            <th>입금자 정보</th>
            <th>배송지 정보</th>
            <th>판매 회사</th>
            <th>Plan 정보</th>
            <th>정산정보</th>
            <th style="width:180px;">개통정보</th>
            <th style="min-width:220px;">전화정보</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="2">
                <div>김성준</div>
                <div>02-333-4444</div>
                <div>등록일: 7/1/2014</div>
                <div>판매일: 7/1/2014</div>
                <div>통신사: LG</div>
                <div>출국일: 7/5/2014</div>
                <div>귀국예정: 7/30/2014</div>
                <div>방문국가:미국</div>
                <button class="btn btn-default" >Edit</button>
                <button class="button btn-primary">Add New Plan</button>
            </td>
            <td rowspan="2">
                <div>돈입금</div>
                <div>입금일: 7/2/2014</div>
            </td>
            <td rowspan="2">
                <div>김수신</div>
                <div>02-555-6666</div>
                <div>배송일: 7/3/2014</div>
                <div>주소: 경기 부천시 원미구 중2동 연화마을아파트 1420동 1101호</div>
                <div>우편번호:560-230</div>
            </td>
            <td rowspan="2">
                <div>유심월드</div>
            </td>
            <td>
                <div class="label label-default">호주 Amaysim</div>
                <button class="button btn-xs">Edit Plan Info</button>
                <div class="table table-bordered table-condensed">
                    <div class="row rowline">
                        <div class="col-sm-3">마이크로유심</div>
                        <div class="col-sm-2">1</div>
                        <div class="col-sm-3 ellipsis" title="5513029949888">5513029949888</div>
                        <div class="col-sm-3">USD 10</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-3">Plus-4G</div>
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-3">12/18일개통-도착확인후</div>
                        <div class="col-sm-3">USD 10</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-3">유심지갑</div>
                        <div class="col-sm-2">1</div>
                        <div class="col-sm-3">&nbsp;</div>
                        <div class="col-sm-3">USD 10</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-3">택배</div>
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-3">97407263026</div>
                        <div class="col-sm-3">KRW 5000</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-3">휴대폰</div>
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-3">옵티머스LTE1</div>
                        <div class="col-sm-3">&nbsp;</div>
                    </div>
                </div>
            </td>
            <td>
                <button class="button btn-xs">정산정보 수정</button>
                <div class="table table-bordered table-condensed">
                    <div class="row rowline">
                        <div class="col-sm-6">플랜총액</div>
                        <div class="col-sm-3">1000</div>
                        <div class="col-sm-3">USD</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">비과세</div>
                        <div class="col-sm-3">500</div>
                        <div class="col-sm-3">KRW</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">과세</div>
                        <div class="col-sm-3">6000</div>
                        <div class="col-sm-3">KRW</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">지불정보</div>
                        <div class="col-sm-3">CC</div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">지불과세</div>
                        <div class="col-sm-3">6000</div>
                        <div class="col-sm-3">KRW</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">이익</div>
                        <div class="col-sm-3">5</div>
                        <div class="col-sm-3">USD</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">Rebate</div>
                        <div class="col-sm-3">1</div>
                        <div class="col-sm-3">USD</div>
                    </div>
                </div>
            </td>
            <td>
                <button class="button btn-xs">개통정보 수정</button>
                <div class="table table-bordered table-condensed">
                    <div class="row rowline">
                        <div class="col-sm-6">개통요청</div>
                        <div class="col-sm-6">7/1/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">개통접수</div>
                        <div class="col-sm-6">7/1/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">번호의뢰</div>
                        <div class="col-sm-6">7/1/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">플랜요청</div>
                        <div class="col-sm-6">7/1/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">개통예정</div>
                        <div class="col-sm-6">7/1/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">개통완료</div>
                        <div class="col-sm-6">7/1/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">접수번호</div>
                        <div class="col-sm-6">1234567</div>
                    </div>
                </div>
            </td>
            <td>
                <div class="label label-default">호주 Amaysim</div>
                <button class="button btn-xs">전화정보 수정</button>
                <div class="table table-bordered table-condensed">
                    <div class="row rowline">
                        <div class="col-sm-6">IMEI</div>
                        <div class="col-sm-6">352370051439702</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">현지번호</div>
                        <div class="col-sm-6">075240493212</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">착신번호</div>
                        <div class="col-sm-6">070-7449-7080</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">착신연결일</div>
                        <div class="col-sm-6">7/3/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">국제전화연결</div>
                        <div class="col-sm-6">7/3/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">개통도시</div>
                        <div class="col-sm-6">플로리다</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">개통국가</div>
                        <div class="col-sm-6">미국</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">방문목적</div>
                        <div class="col-sm-6">여행</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">아이디</div>
                        <div class="col-sm-6">111@hotmail.com</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">PIN</div>
                        <div class="col-sm-6">USIM12345</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">마이크로유심 / 2</div>
                        <div class="col-sm-6">1325235232315<br />123512351235</div>
                    </div>
                    
                    <div class="row rowline">
                        <div class="col-sm-6">택배번호</div>
                        <div class="col-sm-6">1235235</div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="label label-default">미국 T-mobile</div>
                <button class="button btn-xs">Edit Plan Info</button>
                <div class="table table-bordered table-condensed">
                    <div class="row rowline">
                        <div class="col-sm-3">일반유심</div>
                        <div class="col-sm-2">1</div>
                        <div class="col-sm-3 ellipsis" title="8901260193502462471F">8901260193502462471F</div>
                        <div class="col-sm-3">USD 10</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-3">$35 월플랜</div>
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-3">미국 6/24일개통</div>
                        <div class="col-sm-3">USD 10</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-3">택배</div>
                        <div class="col-sm-2">1</div>
                        <div class="col-sm-3">97753426142</div>
                        <div class="col-sm-3">KRW 500</div>
                    </div>
                </div>
            </td>
            <td>
                <button class="button btn-xs">정산정보 수정</button>
                <div class="table table-bordered table-condensed">
                    <div class="row rowline">
                        <div class="col-sm-6">플랜총액</div>
                        <div class="col-sm-3">1000</div>
                        <div class="col-sm-3">USD</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">비과세</div>
                        <div class="col-sm-3">500</div>
                        <div class="col-sm-3">KRW</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">과세</div>
                        <div class="col-sm-3">6000</div>
                        <div class="col-sm-3">KRW</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">지불정보</div>
                        <div class="col-sm-3">CC</div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">지불과세</div>
                        <div class="col-sm-3">6000</div>
                        <div class="col-sm-3">KRW</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">이익</div>
                        <div class="col-sm-3">5</div>
                        <div class="col-sm-3">USD</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">Rebate</div>
                        <div class="col-sm-3">1</div>
                        <div class="col-sm-3">USD</div>
                    </div>
                </div>
            </td>
            
            <td>
                <button class="button btn-xs">개통정보 수정</button>
                <div class="table table-bordered table-condensed">
                    <div class="row rowline">
                        <div class="col-sm-6">개통요청</div>
                        <div class="col-sm-6">7/1/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">개통접수</div>
                        <div class="col-sm-6">7/1/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">번호의뢰</div>
                        <div class="col-sm-6">7/1/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">플랜요청</div>
                        <div class="col-sm-6">7/1/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">개통예정</div>
                        <div class="col-sm-6">7/1/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">개통완료</div>
                        <div class="col-sm-6">7/1/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">접수번호</div>
                        <div class="col-sm-6">1234567</div>
                    </div>
                </div>
            </td>
            <td>
                <button class="button btn-xs">전화정보 수정</button>
                <div class="table table-bordered table-condensed">
                    <div class="row rowline">
                        <div class="col-sm-6">IMEI</div>
                        <div class="col-sm-6">352370051439702</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">현지번호</div>
                        <div class="col-sm-6">075240493212</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">착신번호</div>
                        <div class="col-sm-6">070-7449-7080</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">착신연결일</div>
                        <div class="col-sm-6">7/3/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">국제전화연결</div>
                        <div class="col-sm-6">7/3/2014</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">개통도시</div>
                        <div class="col-sm-6">플로리다</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">개통국가</div>
                        <div class="col-sm-6">미국</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">방문목적</div>
                        <div class="col-sm-6">여행</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">아이디</div>
                        <div class="col-sm-6">111@hotmail.com</div>
                    </div>
                    <div class="row rowline">
                        <div class="col-sm-6">PIN</div>
                        <div class="col-sm-6">USIM12345</div>
                    </div>
                    
                    <div class="row rowline">
                        <div class="col-sm-6">유심번호</div>
                        <div class="col-sm-6">USIM12345</div>
                    </div>
                    
                    <div class="row rowline">
                        <div class="col-sm-6">택배번호</div>
                        <div class="col-sm-6">1235235</div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div>이재희</div>
                <div>02-333-5555</div>
                <div>등록일: 7/1/2014</div>
                <div>판매일: 7/1/2014</div>
                <div>통신사: LG</div>
                <div>출국일: 7/5/2014</div>
                <div>귀국예정: 7/30/2014</div>
                <div>방문국가:미국</div>
                <button class="btn btn-default" >Edit</button>
                <button class="button btn-primary">Add New Plan</button>
            </td>
            <td>
                <div>돈입금</div>
                <div>입금일: 7/2/2014</div>
            </td>
            <td>
                <div>김수신</div>
                <div>02-555-6666</div>
                <div>배송일: 7/3/2014</div>
                <div>주소: 경기 부천시 원미구 중2동 연화마을아파트 1420동 1101호</div>
                <div>우편번호:560-230</div>
            </td>
            <td>무심세상</td>
            <td>
                <button class="button btn-primary">새 플랜을 등록해 주세요</button>
            </td>
            <td>
                <div class="table table-bordered table-condensed">
                    <div class="row rowline">
                        정보가 없습니다
                    </div>
                </div>
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>
					

