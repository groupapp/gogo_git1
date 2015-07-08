<?php
//	require_once("../include/function.php");
	
	$info	= empty($_GET["info"])?"":$_GET["info"];
	
	$DB 	= new myDB;
?>
<div class="main-col1 col-md-9">
	<div class="page-title">
		<h1>
			<span>Size Charts</span>
		</h1>		
	</div>
	<div class="contents">
		<div class="sub1">
			<div class="title_sub">Size Charts of Soccer Balls</div>
			<div class="subcontents">
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Ball Size</th>
							<th class="subject2 header_color">Player Age<span class="redstar">*</span></th>
							<th class="subject2 header_color">Ball Circumference</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">1 / Mini / Skills</td>
							<td class="general">All ages</td>
							<td class="general">18" - 20"</td>
						</tr>
						<tr>
							<td class="general row_color">2 / Midi</td>
							<td class="general row_color">All ages</td>
							<td class="general row_color">20" - 22"</td>
						</tr>
						<tr>
							<td class="general">3</td>
							<td class="general">Under 8</td>
							<td class="general">23" - 24"</td>
						</tr>
						<tr>
							<td class="general row_color">4</td>
							<td class="general row_color">8 - 12</td>
							<td class="general row_color">25" - 26"</td>
						</tr>
						<tr>
							<td class="general">5</td>
							<td class="general">12 and up</td>
							<td class="general">27" - 28"</td>
						</tr>
					</tbody>
				</table>
				<p class="p_general"><span class="redstar">*</span> Consult with your coach or team manager to determine a ball size that is right for you.</p>
			</div>
			<br/>
			<div class="title_sub">Size Charts of Shinguards</div>
			<div class="subcontents">
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size<span class="redstar">*</span></th>
							<th class="subject2 header_color">Recommended Height Range</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">XXS/YS</td>
							<td class="general">Up to 3'3"</td>
						</tr>
						<tr>
							<td class="general row_color">XS/YM</td>
							<td class="general row_color">3'4" - 3'11"</td>
						</tr>
						<tr>
							<td class="general">S/JR/YL</td>
							<td class="general">4'0" - 4'7"</td>
						</tr>
						<tr>
							<td class="general row_color">M/JR</td>
							<td class="general row_color">4'8" - 5'3"</td>
						</tr>
						<tr>
							<td class="general">L/SR</td>
							<td class="general">5'4" - 5'11"</td>
						</tr>
						<tr>
							<td class="general row_color">XL</td>
							<td class="general row_color">6'0" and up</td>
						</tr>
					</tbody>
				</table>
				<p class="p_general"><span class="redstar">*</span> As a shinguard increases in size, it becomes longer and wider to accommodate larger leg diameters.</p>
			</div>
		</div>
		<div class="sub2">
			<div class="title_sub">Size Charts of Major Brands</div>
			<div class="subcontents">
				<p class="p_general">Click one below to see its size specifications:</p>
				<ul>
					<li class="bullet">
						<a href="#Guidelines">General Guidelines of Sizes</a>
					</li>
					<li class="bullet">
						<a href="#Adidas">Adidas</a>
					</li>
					<li class="bullet">
						<a href="#Diadora">Diadora</a>
					</li>
					<li class="bullet">
						<a href="#Joma">Joma</a>
					</li>
					<li class="bullet">
						<a href="#Kelme">Kelme</a>
					</li>
					<li class="bullet">
						<a href="#Nike">Nike</a>
					</li>
					<li class="bullet">
						<a href="#Puma">Puma</a>
					</li>
					<li class="bullet">
						<a href="#Reebok">Reebok</a>
					</li>
					<li class="bullet">
						<a href="#Rhinox">Rhinox</a>
					</li>
					<li class="bullet">
						<a href="#Umbro">Umbro</a>
					</li>
				</ul>
				<br/>
				<br/>
				<br/>
				<a name="Guidelines">
					<p class="p_title">General Guidelines of Sizes </p>
				</a>
				<p class="p_bold">Men</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">35-38</td>
							<td class="general">29-31</td>
							<td class="general">35-38</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">38-41</td>
							<td class="general row_color">31-34</td>
							<td class="general row_color">38-40</td>
							<td class="general row_color">32</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">41-44</td>
							<td class="general">34-37</td>
							<td class="general">41-43</td>
							<td class="general">33</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">44-47</td>
							<td class="general row_color">37-41</td>
							<td class="general row_color">43-46</td>
							<td class="general row_color">34</td>
						</tr>
						<tr>
							<td class="general">2X-Large</td>
							<td class="general">47-50</td>
							<td class="general">41-44</td>
							<td class="general">46-49</td>
							<td class="general">35</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Women</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">31-33</td>
							<td class="general">23-25</td>
							<td class="general">33-35</td>
							<td class="general">30</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">33-36</td>
							<td class="general row_color">25-28</td>
							<td class="general row_color">35-38</td>
							<td class="general row_color">30.5</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">36-39</td>
							<td class="general">28-31</td>
							<td class="general">38-41</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">39-42</td>
							<td class="general row_color">31-34</td>
							<td class="general row_color">41-44</td>
							<td class="general row_color">31.5</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">42-45</td>
							<td class="general">34-37</td>
							<td class="general">44-47</td>
							<td class="general">32</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Youth</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">25-26</td>
							<td class="general">22-24</td>
							<td class="general">25-27</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">26-28</td>
							<td class="general row_color">24-25</td>
							<td class="general row_color">27-29</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">28-30</td>
							<td class="general">25-26</td>
							<td class="general">29-31</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">30-32</td>
							<td class="general row_color">26-27</td>
							<td class="general row_color">31-33</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">32-35</td>
							<td class="general">27-29</td>
							<td class="general">33-35</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Little Kids</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Height</th>
							<th class="subject2 header_color">Waist</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">39-42</td>
							<td class="general">36-41</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">42-45</td>
							<td class="general row_color">41-46</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">46-49</td>
							<td class="general">47-51</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">49-50</td>
							<td class="general row_color">52-55</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Toddlers</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Height</th>
							<th class="subject2 header_color">Waist</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">33-35</td>
							<td class="general">29-31</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">36-38</td>
							<td class="general row_color">32-36</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">39-41</td>
							<td class="general">37-40</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Socks   (by Shoe Sizes)</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Men</th>
							<th class="subject2 header_color">Women</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">12T-2</td>
							<td class="general">1-4</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">2-5</td>
							<td class="general row_color">3-6</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">5-8</td>
							<td class="general">7-10</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">9-12</td>
							<td class="general row_color">11-14</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Shinguards</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Length</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">9 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">10 in.</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">11 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">12 in.</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">13 in.</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Kids' Footwear (Shoes)</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">U.S.</th>
							<th class="subject2 header_color">U.K.</th>
							<th class="subject2 header_color">Europe</th>
							<th class="subject2 header_color">cm</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">9</td>
							<td class="general">8</td>
							<td class="general">25</td>
							<td class="general">15.6</td>
						</tr>
						<tr>
							<td class="general row_color">9.5</td>
							<td class="general row_color">8.5.</td>
							<td class="general row_color">26</td>
							<td class="general row_color">15.9</td>
						</tr>
						<tr>
							<td class="general">10</td>
							<td class="general">9.</td>
							<td class="general">27</td>
							<td class="general">16.5</td>
						</tr>
						<tr>
							<td class="general row_color">10.5</td>
							<td class="general row_color">9.5</td>
							<td class="general row_color">27</td>
							<td class="general row_color">16.8</td>
						</tr>
						<tr>
							<td class="general">11</td>
							<td class="general">10</td>
							<td class="general">28</td>
							<td class="general">17.1</td>
						</tr>
						<tr>
							<td class="general row_color">11.5</td>
							<td class="general row_color">10.5</td>
							<td class="general row_color">29</td>
							<td class="general row_color">17.8</td>
						</tr>
						<tr>
							<td class="general">12</td>
							<td class="general">11</td>
							<td class="general">30</td>
							<td class="general">18.1</td>
						</tr>
						<tr>
							<td class="general row_color">12.5</td>
							<td class="general row_color">11.5</td>
							<td class="general row_color">30</td>
							<td class="general row_color">18.4</td>
						</tr>
						<tr>
							<td class="general">13</td>
							<td class="general">12</td>
							<td class="general">31</td>
							<td class="general">19.1</td>
						</tr>
						<tr>
							<td class="general row_color">13.5</td>
							<td class="general row_color">12.5</td>
							<td class="general row_color">31</td>
							<td class="general row_color">19.4</td>
						</tr>
						<tr>
							<td class="general">1</td>
							<td class="general">13</td>
							<td class="general">32</td>
							<td class="general">19.7</td>
						</tr>
						<tr>
							<td class="general row_color">1.5</td>
							<td class="general row_color">14</td>
							<td class="general row_color">33</td>
							<td class="general row_color">20.3</td>
						</tr>
						<tr>
							<td class="general">2</td>
							<td class="general">1</td>
							<td class="general">33</td>
							<td class="general">20.6</td>
						</tr>
						<tr>
							<td class="general row_color">2.5</td>
							<td class="general row_color">1.5</td>
							<td class="general row_color">34</td>
							<td class="general row_color">21.0</td>
						</tr>
						<tr>
							<td class="general">3</td>
							<td class="general">2</td>
							<td class="general">34</td>
							<td class="general">21.6</td>
						</tr>
						<tr>
							<td class="general row_color">3.5</td>
							<td class="general row_color">2.5</td>
							<td class="general row_color">35</td>
							<td class="general row_color">21.9</td>
						</tr>
						<tr>
							<td class="general">4</td>
							<td class="general">3</td>
							<td class="general">36</td>
							<td class="general">22.2</td>
						</tr>
						<tr>
							<td class="general row_color">4.5</td>
							<td class="general row_color">3.5</td>
							<td class="general row_color">36</td>
							<td class="general row_color">22.9</td>
						</tr>
						<tr>
							<td class="general">5</td>
							<td class="general">4</td>
							<td class="general">37</td>
							<td class="general">23.2</td>
						</tr>
						<tr>
							<td class="general row_color">5.5</td>
							<td class="general row_color">4.5</td>
							<td class="general row_color">37</td>
							<td class="general row_color">23.5</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Adults' Footwear (Shoes)</p>
				<table class="table_jy">
					<thead>
						<tr class="thin_border_bottom">
							<th colspan="2" class="subject2_c header_color thin_border_right">U.S.</th>
							<th colspan="2" class="subject2_c header_color thin_border_right">U.K.</th>
							<th colspan="2" class="subject2_c header_color thin_border_right">Europe</th>
							<th rowspan="2" class="subject2 header_color" style="vertical-align: middle; text-align: center;">cm</th>
						</tr>
						<tr>
							<th class="subject2_c header_color">Women</th>
							<th class="subject2_c header_color thin_border_right">Men</th>
							<th class="subject2_c header_color">Women</th>
							<th class="subject2_c header_color thin_border_right">Men</th>
							<th class="subject2_c header_color">Women</th>
							<th class="subject2_c header_color thin_border_right">Men</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">5</td>
							<td class="general"></td>
							<td class="general">2.5</td>
							<td class="general"></td>
							<td class="general">35.5</td>
							<td class="general"></td>
							<td class="general">22</td>
						</tr>
						<tr>
							<td class="general row_color">5.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">3</td>
							<td class="general row_color"></td>
							<td class="general row_color">36</td>
							<td class="general row_color"></td>
							<td class="general row_color">22.5</td>
						</tr>
						<tr>
							<td class="general">6</td>
							<td class="general"></td>
							<td class="general">3.5</td>
							<td class="general"></td>
							<td class="general">36.5</td>
							<td class="general"></td>
							<td class="general">23</td>
						</tr>
						<tr>
							<td class="general row_color">6.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">4</td>
							<td class="general row_color"></td>
							<td class="general row_color">37.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">23.5</td>
						</tr>
						<tr>
							<td class="general">7</td>
							<td class="general">6</td>
							<td class="general">4.5</td>
							<td class="general">5</td>
							<td class="general">38</td>
							<td class="general">39</td>
							<td class="general">24</td>
						</tr>
						<tr>
							<td class="general row_color">7.5</td>
							<td class="general row_color">6.5</td>
							<td class="general row_color">5</td>
							<td class="general row_color">5.5</td>
							<td class="general row_color">38.5</td>
							<td class="general row_color">39.5</td>
							<td class="general row_color">24.5</td>
						</tr>
						<tr>
							<td class="general">8</td>
							<td class="general">7</td>
							<td class="general">5.5</td>
							<td class="general">6</td>
							<td class="general">39</td>
							<td class="general">40</td>
							<td class="general">25</td>
						</tr>
						<tr>
							<td class="general row_color">8.5</td>
							<td class="general row_color">7.5</td>
							<td class="general row_color">6</td>
							<td class="general row_color">6.5</td>
							<td class="general row_color">40</td>
							<td class="general row_color">40.5</td>
							<td class="general row_color">25.5</td>
						</tr>
						<tr>
							<td class="general">9</td>
							<td class="general">8</td>
							<td class="general">6.5</td>
							<td class="general">7</td>
							<td class="general">40.5</td>
							<td class="general">41</td>
							<td class="general">26</td>
						</tr>
						<tr>
							<td class="general row_color">9.5</td>
							<td class="general row_color">8.5</td>
							<td class="general row_color">7</td>
							<td class="general row_color">7.5</td>
							<td class="general row_color">41</td>
							<td class="general row_color">42</td>
							<td class="general row_color">26.5</td>
						</tr>
						<tr>
							<td class="general">10</td>
							<td class="general">9</td>
							<td class="general">7.5</td>
							<td class="general">8</td>
							<td class="general">42</td>
							<td class="general">42.5</td>
							<td class="general">27</td>
						</tr>
						<tr>
							<td class="general row_color">10.5</td>
							<td class="general row_color">9.5</td>
							<td class="general row_color">8</td>
							<td class="general row_color">8.5</td>
							<td class="general row_color">42.5</td>
							<td class="general row_color">43</td>
							<td class="general row_color">27.5</td>
						</tr>
						<tr>
							<td class="general">11</td>
							<td class="general">10</td>
							<td class="general">8.5</td>
							<td class="general">9</td>
							<td class="general">43</td>
							<td class="general">44</td>
							<td class="general">28</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">10.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">9.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">44.5</td>
							<td class="general row_color">28.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">11</td>
							<td class="general"></td>
							<td class="general">10</td>
							<td class="general"></td>
							<td class="general">45</td>
							<td class="general">29</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">11.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">10.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">45.5</td>
							<td class="general row_color">29.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">12</td>
							<td class="general"></td>
							<td class="general">11</td>
							<td class="general"></td>
							<td class="general">46</td>
							<td class="general">30</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">12.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">11.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">47</td>
							<td class="general row_color">30.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">13</td>
							<td class="general"></td>
							<td class="general">12</td>
							<td class="general"></td>
							<td class="general">47.5</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">13.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">12.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">48</td>
							<td class="general row_color">31.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">14</td>
							<td class="general"></td>
							<td class="general">13</td>
							<td class="general"></td>
							<td class="general">48.5</td>
							<td class="general">32</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">15</td>
							<td class="general row_color"></td>
							<td class="general row_color">14</td>
							<td class="general row_color"></td>
							<td class="general row_color">49.5</td>
							<td class="general row_color">33</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<a name="Adidas">
					<p class="p_title">Adidas Sizes</p>
				</a>
				<p class="p_bold">Men</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">34-36</td>
							<td class="general">28-31</td>
							<td class="general">34-36</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">38-40</td>
							<td class="general row_color">31-34</td>
							<td class="general row_color">38-40</td>
							<td class="general row_color">32</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">42-44</td>
							<td class="general">35-38</td>
							<td class="general">42-44</td>
							<td class="general">33</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">46-48</td>
							<td class="general row_color">39-41</td>
							<td class="general row_color">46-48</td>
							<td class="general row_color">34</td>
						</tr>
						<tr>
							<td class="general">2X-Large</td>
							<td class="general">48-50</td>
							<td class="general">42-44</td>
							<td class="general">48-50</td>
							<td class="general">35</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Women</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">31-32</td>
							<td class="general">23-25</td>
							<td class="general">33-35</td>
							<td class="general">30</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">33-35</td>
							<td class="general row_color">25-27</td>
							<td class="general row_color">36-38</td>
							<td class="general row_color">30.5</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">36-38</td>
							<td class="general">28-30</td>
							<td class="general">39-41</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">39-41</td>
							<td class="general row_color">31-33</td>
							<td class="general row_color">42-44</td>
							<td class="general row_color">31.5</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">42-44</td>
							<td class="general">34-36</td>
							<td class="general">45-47</td>
							<td class="general">32</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Youth</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Height</th>
							<th class="subject2 header_color">Weight</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">50-53</td>
							<td class="general">55-75</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">54-59</td>
							<td class="general row_color">76-95</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">60-64</td>
							<td class="general">96-117</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">64-68</td>
							<td class="general row_color">118-138</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Little Kids</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Height</th>
							<th class="subject2 header_color">Weight</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">39-42</td>
							<td class="general">36-41</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">42-45</td>
							<td class="general row_color">41-46</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">46-49</td>
							<td class="general">47-51</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">49-50</td>
							<td class="general row_color">52-55</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Toddlers</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Height</th>
							<th class="subject2 header_color">Weight</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">33-35</td>
							<td class="general">29-31</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">36-38</td>
							<td class="general row_color">32-36</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">39-41</td>
							<td class="general">37-40</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Socks   (by Shoe Sizes)</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Men</th>
							<th class="subject2 header_color">Women</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">12T-2</td>
							<td class="general">1-4</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">2-5</td>
							<td class="general row_color">4-7</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">5-9</td>
							<td class="general">7-10</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">9 +</td>
							<td class="general row_color">10 +</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Shinguards</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Length</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">9 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">10 in.</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">11 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">12 in.</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">13 in.</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Footwear (Shoes)</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Women</th>
							<th class="subject2 header_color">Men</th>
							<th class="subject2 header_color">U.K.</th>
							<th class="subject2 header_color">Europe</th>
							<th class="subject2 header_color">Japan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">5</td>
							<td class="general">4</td>
							<td class="general">3.5</td>
							<td class="general">36</td>
							<td class="general">22</td>
						</tr>
						<tr>
							<td class="general row_color">5.5</td>
							<td class="general row_color">4.5</td>
							<td class="general row_color">4</td>
							<td class="general row_color">36.67</td>
							<td class="general row_color">22.5</td>
						</tr>
						<tr>
							<td class="general">6</td>
							<td class="general">5</td>
							<td class="general">4.5</td>
							<td class="general">37.33</td>
							<td class="general">23</td>
						</tr>
						<tr>
							<td class="general row_color">6.5</td>
							<td class="general row_color">5.5</td>
							<td class="general row_color">5</td>
							<td class="general row_color">38</td>
							<td class="general row_color">23.5</td>
						</tr>
						<tr>
							<td class="general">7</td>
							<td class="general">6</td>
							<td class="general">5.5</td>
							<td class="general">38.67</td>
							<td class="general">24</td>
						</tr>
						<tr>
							<td class="general row_color">7.5</td>
							<td class="general row_color">6.5</td>
							<td class="general row_color">6</td>
							<td class="general row_color">39.33</td>
							<td class="general row_color">23.5</td>
						</tr>
						<tr>
							<td class="general">8</td>
							<td class="general">7</td>
							<td class="general">6.5</td>
							<td class="general">40</td>
							<td class="general">25</td>
						</tr>
						<tr>
							<td class="general row_color">8.5</td>
							<td class="general row_color">7.5</td>
							<td class="general row_color">7</td>
							<td class="general row_color">40.67</td>
							<td class="general row_color">25.5</td>
						</tr>
						<tr>
							<td class="general">9</td>
							<td class="general">8</td>
							<td class="general">7.5</td>
							<td class="general">41.33</td>
							<td class="general">26</td>
						</tr>
						<tr>
							<td class="general row_color">9.5</td>
							<td class="general row_color">8.5</td>
							<td class="general row_color">8</td>
							<td class="general row_color">42</td>
							<td class="general row_color">26.5</td>
						</tr>
						<tr>
							<td class="general">10</td>
							<td class="general">9</td>
							<td class="general">8.5</td>
							<td class="general">42.67</td>
							<td class="general">27</td>
						</tr>
						<tr>
							<td class="general row_color">10.5</td>
							<td class="general row_color">9.5</td>
							<td class="general row_color">9</td>
							<td class="general row_color">43.33</td>
							<td class="general row_color">27.5</td>
						</tr>
						<tr>
							<td class="general">11</td>
							<td class="general">10</td>
							<td class="general">9.5</td>
							<td class="general">44</td>
							<td class="general">28</td>
						</tr>
						<tr>
							<td class="general row_color">11.5</td>
							<td class="general row_color">10.5</td>
							<td class="general row_color">10</td>
							<td class="general row_color">44.67</td>
							<td class="general row_color">28.5</td>
						</tr>
						<tr>
							<td class="general">12</td>
							<td class="general">11</td>
							<td class="general">10.5</td>
							<td class="general">45.33</td>
							<td class="general">29</td>
						</tr>
						<tr>
							<td class="general row_color">12.5</td>
							<td class="general row_color">11.5</td>
							<td class="general row_color">11</td>
							<td class="general row_color">46</td>
							<td class="general row_color">29.5</td>
						</tr>
						<tr>
							<td class="general">13</td>
							<td class="general">12</td>
							<td class="general">11.5</td>
							<td class="general">46.67</td>
							<td class="general">30</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">12.5</td>
							<td class="general row_color">12</td>
							<td class="general row_color">47.33</td>
							<td class="general row_color">30.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">13</td>
							<td class="general">12.5</td>
							<td class="general">48</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">13.5</td>
							<td class="general row_color">13</td>
							<td class="general row_color">48.67</td>
							<td class="general row_color">31.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">14</td>
							<td class="general">13.5</td>
							<td class="general">49.33</td>
							<td class="general">32</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">14.5</td>
							<td class="general row_color">14</td>
							<td class="general row_color">50</td>
							<td class="general row_color">32.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">15</td>
							<td class="general">14.5</td>
							<td class="general">47.33</td>
							<td class="general">33</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>				
				<a name="Diadora">
					<p class="p_title">Diadora Sizes</p>
				</a>
				<p class="p_bold">Men</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">35-37</td>
							<td class="general">29-31</td>
							<td class="general">36-38</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">38-40</td>
							<td class="general row_color">32-34</td>
							<td class="general row_color">39-41</td>
							<td class="general row_color">32</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">41-44</td>
							<td class="general">35-38</td>
							<td class="general">41-44</td>
							<td class="general">33</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">45-48</td>
							<td class="general row_color">39-41</td>
							<td class="general row_color">45-49</td>
							<td class="general row_color">34</td>
						</tr>
						<tr>
							<td class="general">2X-Large</td>
							<td class="general">49-55</td>
							<td class="general">42-45</td>
							<td class="general">50-54</td>
							<td class="general">35</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Women</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">30-32</td>
							<td class="general">21-23</td>
							<td class="general">31-33</td>
							<td class="general">30</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">33-34</td>
							<td class="general row_color">24-25</td>
							<td class="general row_color">34-35</td>
							<td class="general row_color">30.5</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">35-37</td>
							<td class="general">26-28</td>
							<td class="general">36-38</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">38-40</td>
							<td class="general row_color">29-31</td>
							<td class="general row_color">39-41</td>
							<td class="general row_color">31.5</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">42-45</td>
							<td class="general">32-34</td>
							<td class="general">42-45</td>
							<td class="general">32</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Youth</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">25-26</td>
							<td class="general">22-24</td>
							<td class="general">25-27</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">26-28</td>
							<td class="general row_color">24-25</td>
							<td class="general row_color">27-29</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">28-30</td>
							<td class="general">25-26</td>
							<td class="general">29-31</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">30-32</td>
							<td class="general row_color">26-27</td>
							<td class="general row_color">31-33</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">32-35</td>
							<td class="general">27-29</td>
							<td class="general">33-35</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Socks   (by Shoe Sizes)</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Men</th>
							<th class="subject2 header_color">Women</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">12T-2</td>
							<td class="general">1-4</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">2-5</td>
							<td class="general row_color">3-6</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">5-8</td>
							<td class="general">7-10</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">9-12</td>
							<td class="general row_color">11-14</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Shinguards</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Length</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">9 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">10 in.</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">11 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">12 in.</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">13 in.</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Footwear (Shoes)</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Women</th>
							<th class="subject2 header_color">Men</th>
							<th class="subject2 header_color">U.K.</th>
							<th class="subject2 header_color">Europe</th>
							<th class="subject2 header_color">cm</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">5</td>
							<td class="general">3.5</td>
							<td class="general">3</td>
							<td class="general">35.5</td>
							<td class="general">21</td>
						</tr>
						<tr>
							<td class="general row_color">5.5</td>
							<td class="general row_color">4</td>
							<td class="general row_color">3.5</td>
							<td class="general row_color">36</td>
							<td class="general row_color">22</td>
						</tr>
						<tr>
							<td class="general">6</td>
							<td class="general">4.5</td>
							<td class="general">4</td>
							<td class="general">36.5</td>
							<td class="general">22.5</td>
						</tr>
						<tr>
							<td class="general row_color">6.5</td>
							<td class="general row_color">5</td>
							<td class="general row_color">4.5</td>
							<td class="general row_color">37</td>
							<td class="general row_color">23</td>
						</tr>
						<tr>
							<td class="general">7</td>
							<td class="general">5.5</td>
							<td class="general">5</td>
							<td class="general">38</td>
							<td class="general">23.5</td>
						</tr>
						<tr>
							<td class="general row_color">7.5</td>
							<td class="general row_color">6</td>
							<td class="general row_color">5.5</td>
							<td class="general row_color">38.5</td>
							<td class="general row_color">24</td>
						</tr>
						<tr>
							<td class="general">8</td>
							<td class="general">6.5</td>
							<td class="general">6</td>
							<td class="general">39</td>
							<td class="general">24.5</td>
						</tr>
						<tr>
							<td class="general row_color">8.5</td>
							<td class="general row_color">7</td>
							<td class="general row_color">6.5</td>
							<td class="general row_color">40</td>
							<td class="general row_color">25</td>
						</tr>
						<tr>
							<td class="general">9</td>
							<td class="general">7.5</td>
							<td class="general">7</td>
							<td class="general">40.5</td>
							<td class="general">25.5</td>
						</tr>
						<tr>
							<td class="general row_color">9.5</td>
							<td class="general row_color">8</td>
							<td class="general row_color">7.5</td>
							<td class="general row_color">41</td>
							<td class="general row_color">26</td>
						</tr>
						<tr>
							<td class="general">10</td>
							<td class="general">8.5</td>
							<td class="general">8</td>
							<td class="general">42</td>
							<td class="general">26.5</td>
						</tr>
						<tr>
							<td class="general row_color">10.5</td>
							<td class="general row_color">9</td>
							<td class="general row_color">8.5</td>
							<td class="general row_color">42.5</td>
							<td class="general row_color">27</td>
						</tr>
						<tr>
							<td class="general">11</td>
							<td class="general">9.5</td>
							<td class="general">9</td>
							<td class="general">43</td>
							<td class="general">27.5</td>
						</tr>
						<tr>
							<td class="general row_color">11.5</td>
							<td class="general row_color">10</td>
							<td class="general row_color">9.5</td>
							<td class="general row_color">44</td>
							<td class="general row_color">28</td>
						</tr>
						<tr>
							<td class="general">12</td>
							<td class="general">10.5</td>
							<td class="general">10</td>
							<td class="general">44.53</td>
							<td class="general">28.5</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">11</td>
							<td class="general row_color">10.5</td>
							<td class="general row_color">45</td>
							<td class="general row_color">29</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">11.5</td>
							<td class="general">11</td>
							<td class="general">45.5</td>
							<td class="general">29.5</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">12</td>
							<td class="general row_color">11.5</td>
							<td class="general row_color">46</td>
							<td class="general row_color">30</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">13</td>
							<td class="general">12.5</td>
							<td class="general">47</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">14</td>
							<td class="general row_color">13.5</td>
							<td class="general row_color">48</td>
							<td class="general row_color">32</td>
						</tr>						
					</tbody>
				</table>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>				
				<a name="Joma">
					<p class="p_title">Joma Sizes</p>
				</a>
				<p class="p_bold">Team Sets (Uniforms) - Adult</p>
				<table class="table_jy">
					<thead>
                      	<th class="subject2 header_color"></th>
                    	<th class="subject2 header_color"></th>
                      	<th class="subject2 header_color">S</th>
                      	<th class="subject2 header_color">M</th>
                      	<th class="subject2 header_color">L</th>
                      	<th class="subject2 header_color">XL</th>
                      	<th class="subject2 header_color">XXL</th>
					</thead>
					<tbody>
						<tr>
	                      	<th rowspan="2" class="general" style="vertical-align: middle;">Jerseys</th>
	                     	<td class="general">Chest</td>
	                      	<td class="general">43</td>
	                      	<td class="general">45</td>
	                      	<td class="general">47</td>
	                      	<td class="general">49</td>
	                      	<td class="general">52</td>
	                    </tr>
	                    <tr>
	                      	<td class="general">Length</td>
	                      	<td class="general">27</td>
	                      	<td class="general">28</td>
	                      	<td class="general">29</td>
	                      	<td class="general">30</td>
	                      	<td class="general">31</td>
	                    </tr>
	                    <tr>
	                      	<th rowspan="2" class="general row_color" style="vertical-align: middle;">Shorts</th>
	                      	<td class="general row_color">Waist</td>
	                      	<td class="general row_color">29-30</td>
	                      	<td class="general row_color">31-32</td>
	                      	<td class="general row_color">33-34</td>
	                      	<td class="general row_color">36-38</td>
	                      	<td class="general row_color">40-42</td>
	                    </tr>
	                    <tr>
	                      	<td class="general row_color">Inseam</td>
	                      	<td class="general row_color">6.5</td>
	                      	<td class="general row_color">7</td>
	                      	<td class="general row_color">7.5</td>
	                      	<td class="general row_color">8.25</td>
	                      	<td class="general row_color">9</td>
	                    </tr>
	                    <tr>
	                      	<th rowspan="2" class="general" style="vertical-align: middle;">Fitted Jerseys</th>
	                      	<td class="general">Chest</td>
	                      	<td class="general">39</td>
	                      	<td class="general">41</td>
	                      	<td class="general">42</td>
	                      	<td class="general">44</td>
	                      	<td class="general">46</td>
	                    </tr>
	                    <tr>
	                      	<td class="general">Length</td>
	                      	<td class="general">25</td>
	                      	<td class="general">26</td>
	                      	<td class="general">27</td>
	                      	<td class="general">28</td>
	                      	<td class="general">29</td>
	                    </tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Team Sets (Uniforms) - Youth</p>
				<table class="table_jy">
					<thead>
						<tr>
                      		<th class="subject2 header_color"></th>
                      		<th class="subject2 header_color"></th>
                      		<th class="subject2 header_color">YXS</th>
                      		<th class="subject2 header_color">YS</th>
                      		<th class="subject2 header_color">YM</th>
                      		<th class="subject2 header_color">YL</th>
                   		</tr>
					</thead>
					<tbody>
						<tr>
                     		<th rowspan="2" class="general" style="vertical-align: middle;">Jerseys</th>
                      		<td class="general">Chest</td>
                      		<td class="general">34</td>
                      		<td class="general">36</td>
                      		<td class="general">38</td>
                      		<td class="general">40</td>
                    	</tr>
	                    <tr>
	                      	<td class="general">Length</td>
	                      	<td class="general">22</td>
	                      	<td class="general">23</td>
	                      	<td class="general">24</td>
	                      	<td class="general">25</td>
	                    </tr>
	                    <tr>
	                      	<th rowspan="2" class="general row_color" style="vertical-align: middle;">Shorts</th>
	                      	<td class="general row_color">Waist</td>
	                      	<td class="general row_color">21-22</td>
	                      	<td class="general row_color">23-24</td>
	                      	<td class="general row_color">25-26</td>
	                      	<td class="general row_color">27-28</td>
	                    </tr>
	                    <tr>
	                      	<td class="general row_color">Inseam</td>
	                      	<td class="general row_color">4 1/3</td>
	                      	<td class="general row_color">5 1/3</td>
	                      	<td class="general row_color">5.5</td>
	                      	<td class="general row_color">5 3/4</td>
	                    </tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Warm-Ups - Adult</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color"></th>
                      		<th class="subject2 header_color"></th>
                      		<th class="subject2 header_color">S</th>
                      		<th class="subject2 header_color">M</th>
                      		<th class="subject2 header_color">L</th>
                      		<th class="subject2 header_color">XL</th>
                      		<th class="subject2 header_color">XXL</th>
						</tr>
					</thead>
					<tbody>
						<tr>
	                    	<th rowspan="3" class="general" style="vertical-align: middle;">Jackets</th>
	                      	<td class="general">Chest</td>
	                      	<td class="general">44</td>
	                      	<td class="general">46</td>
	                      	<td class="general">48</td>
	                      	<td class="general">50</td>
	                      	<td class="general">53</td>
	                    </tr>
	                    <tr>
	                      	<td class="general">Length</td>
	                      	<td class="general">26</td>
	                      	<td class="general">27</td>
	                      	<td class="general">28</td>
	                      	<td class="general">29</td>
	                      	<td class="general">30</td>
	                    </tr>
	                    <tr>
	                      	<td class="general">Sleeve</td>
	                      	<td class="general">28 1/3</td>
	                      	<td class="general">30</td>
	                      	<td class="general">31.5</td>
	                      	<td class="general">33</td>
	                      	<td class="general">34 2/3</td>
	                    </tr>
	                    <tr>
	                      	<th rowspan="3" class="general row_color" style="vertical-align: middle;">Trousers/Pants</th>
	                      	<td class="general row_color">Waist</td>
	                      	<td class="general row_color">29-30</td>
	                      	<td class="general row_color">31-32</td>
	                      	<td class="general row_color">33-34</td>
	                      	<td class="general row_color">36-38</td>
	                      	<td class="general row_color">40-42</td>
	                    </tr>
	                    <tr>
	                      	<td class="general row_color">Inseam</td>
	                      	<td class="general row_color">30</td>
	                      	<td class="general row_color">31</td>
	                      	<td class="general row_color">32</td>
	                      	<td class="general row_color">33</td>
	                      	<td class="general row_color">34</td>
	                    </tr>
	                    <tr>
	                      	<td class="general row_color">Length</td>
	                      	<td class="general row_color">39.5</td>
	                      	<td class="general row_color">41</td>
	                      	<td class="general row_color">42.5</td>
	                      	<td class="general row_color">44</td>
	                      	<td class="general row_color">45.5</td>
	                    </tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Warm-Ups - Youth</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color"></th>
                      		<th class="subject2 header_color"></th>
                      		<th class="subject2 header_color">YXS (8 Years)</th>
                      		<th class="subject2 header_color">YS (10 Years)</th>
                      		<th class="subject2 header_color">YM (12 Years)</th>
                      		<th class="subject2 header_color">YL (14 Years)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
	                    	<th rowspan="3" class="general" style="vertical-align: middle;">Jackets</th>
	                      	<td class="general">Chest</td>
	                      	<td class="general">35</td>
	                      	<td class="general">37</td>
	                      	<td class="general">39</td>
	                      	<td class="general">41</td>
	                    </tr>
	                    <tr>
	                      	<td class="general">Length</td>
	                      	<td class="general">19 2/3</td>
	                      	<td class="general">21 1/4</td>
	                      	<td class="general">23</td>
	                      	<td class="general">24 1/2</td>
	                    </tr>
	                    <tr>
	                      <td class="general">Sleeve</td>
	                      <td class="general">22</td>
	                      <td class="general">23.5</td>
	                      <td class="general">25 1/4</td>
	                      <td class="general">27</td>
	                    </tr>
	                    <tr>
	                      <th rowspan="3" class="general row_color" style="vertical-align: middle;">Trouser/Pants</th>
	                      <td class="general row_color">Waist</td>
	                      <td class="general row_color">21-22</td>
	                      <td class="general row_color">23-24</td>
	                      <td class="general row_color">25-26</td>
	                      <td class="general row_color">27-28</td>
	                    </tr>
	                    <tr>
	                      <td class="general row_color">Inseam</td>
	                      <td class="general row_color">21</td>
	                      <td class="general row_color">23</td>
	                      <td class="general row_color">25</td>
	                      <td class="general row_color">27</td>
	                    </tr>
	                    <tr>
	                      <td class="general row_color">Length</td>
	                      <td class="general row_color">30 1/3</td>
	                      <td class="general row_color">33</td>
	                      <td class="general row_color">36</td>
	                      <td class="general row_color">38</td>
	                    </tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">US Footwear Sizes</p>
				<table class="table_jy">
					<tbody>
						<tr>
							<th class="subject2 header_color">Adult</th>
							<td class="general">6</td>
							<td class="general">6.5</td>
							<td class="general">7</td>
							<td class="general">7.5</td>
							<td class="general">8</td>
							<td class="general">8.5</td>
							<td class="general">9</td>
							<td class="general">9.5</td>
							<td class="general">10</td>
							<td class="general">10.5</td>
							<td class="general">11</td>
							<td class="general">11.5</td>
							<td class="general">12</td>
							<td class="general">12.5</td>
							<td colspan="3" class="general"></td>						
						</tr>
						<tr>
							<th class="subject2 header_color">Youth</th>
							<td class="general row_color">10</td>
							<td class="general row_color">10.5</td>
							<td class="general row_color">11</td>
							<td class="general row_color">11.5</td>
							<td class="general row_color">12</td>
							<td class="general row_color">13</td>
							<td class="general row_color">13.5</td>
							<td class="general row_color">1</td>
							<td class="general row_color">1.5</td>
							<td class="general row_color">2</td>
							<td class="general row_color">2.5</td>
							<td class="general row_color">3</td>
							<td class="general row_color">3.5</td>
							<td class="general row_color">4</td>
							<td class="general row_color">4.5</td>
							<td class="general row_color">5</td>
							<td class="general row_color">5.5</td>					
						</tr>
					</tbody>
				</table>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<a name="Kelme">
					<p class="p_title">Kelme Sizes</p>
				</a>
				<p class="p_bold">Men</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">35-38</td>
							<td class="general">29-31</td>
							<td class="general">35-38</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">38-41</td>
							<td class="general row_color">31-34</td>
							<td class="general row_color">38-40</td>
							<td class="general row_color">32</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">41-44</td>
							<td class="general">34-37</td>
							<td class="general">41-43</td>
							<td class="general">33</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">44-47</td>
							<td class="general row_color">37-41</td>
							<td class="general row_color">43-46</td>
							<td class="general row_color">34</td>
						</tr>
						<tr>
							<td class="general">2X-Large</td>
							<td class="general">47-50</td>
							<td class="general">41-44</td>
							<td class="general">46-49</td>
							<td class="general">35</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Women</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">31-33</td>
							<td class="general">23-25</td>
							<td class="general">33-35</td>
							<td class="general">30</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">33-36</td>
							<td class="general row_color">25-28</td>
							<td class="general row_color">35-38</td>
							<td class="general row_color">30.5</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">36-39</td>
							<td class="general">28-31</td>
							<td class="general">38-41</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">39-42</td>
							<td class="general row_color">31-34</td>
							<td class="general row_color">41-44</td>
							<td class="general row_color">31.5</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">42-45</td>
							<td class="general">34-37</td>
							<td class="general">44-47</td>
							<td class="general">32</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Youth</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">25-26</td>
							<td class="general">22-24</td>
							<td class="general">25-27</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">26-28</td>
							<td class="general row_color">24-25</td>
							<td class="general row_color">27-29</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">28-30</td>
							<td class="general">25-26</td>
							<td class="general">29-31</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">30-32</td>
							<td class="general row_color">26-27</td>
							<td class="general row_color">31-33</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">32-35</td>
							<td class="general">27-29</td>
							<td class="general">33-35</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Socks   (by Shoe Sizes)</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Men</th>
							<th class="subject2 header_color">Women</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">12T-2</td>
							<td class="general">1-4</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">2-5</td>
							<td class="general row_color">3-6</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">5-8</td>
							<td class="general">7-10</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">9-12</td>
							<td class="general row_color">11-14</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Shinguards</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Length</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">9 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">10 in.</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">11 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">12 in.</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">13 in.</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Footwear (Shoes)</p>
				<table class="table_jy">
					<thead>
						<tr class="thin_border_bottom">
							<th colspan="2" class="subject2_c header_color thin_border_right">U.S.</th>
							<th colspan="2" class="subject2_c header_color thin_border_right">U.K.</th>
							<th colspan="2" class="subject2_c header_color thin_border_right">Europe</th>
							<th rowspan="2" class="subject2_c header_color" style="vertical-align: middle;">cm</th>
						</tr>
						<tr>
							<th class="subject2_c header_color">Women</th>
							<th class="subject2_c header_color thin_border_right">Men</th>
							<th class="subject2_c header_color">Women</th>
							<th class="subject2_c header_color thin_border_right">Men</th>
							<th class="subject2_c header_color">Women</th>
							<th class="subject2_c header_color thin_border_right">Men</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">5</td>
							<td class="general"></td>
							<td class="general">2.5</td>
							<td class="general"></td>
							<td class="general">35.5</td>
							<td class="general"></td>
							<td class="general">22</td>
						</tr>
						<tr>
							<td class="general row_color">5.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">3</td>
							<td class="general row_color"></td>
							<td class="general row_color">36</td>
							<td class="general row_color"></td>
							<td class="general row_color">22.5</td>
						</tr>
						<tr>
							<td class="general">6</td>
							<td class="general"></td>
							<td class="general">3.5</td>
							<td class="general"></td>
							<td class="general">36.5</td>
							<td class="general"></td>
							<td class="general">23</td>
						</tr>
						<tr>
							<td class="general row_color">6.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">4</td>
							<td class="general row_color"></td>
							<td class="general row_color">37.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">23.5</td>
						</tr>
						<tr>
							<td class="general">7</td>
							<td class="general">6</td>
							<td class="general">4.5</td>
							<td class="general">5</td>
							<td class="general">38</td>
							<td class="general">39</td>
							<td class="general">24</td>
						</tr>
						<tr>
							<td class="general row_color">7.5</td>
							<td class="general row_color">6.5</td>
							<td class="general row_color">5</td>
							<td class="general row_color">5.5</td>
							<td class="general row_color">38.5</td>
							<td class="general row_color">39.5</td>
							<td class="general row_color">24.5</td>
						</tr>
						<tr>
							<td class="general">8</td>
							<td class="general">7</td>
							<td class="general">5.5</td>
							<td class="general">6</td>
							<td class="general">39</td>
							<td class="general">40</td>
							<td class="general">25</td>
						</tr>
						<tr>
							<td class="general row_color">8.5</td>
							<td class="general row_color">7.5</td>
							<td class="general row_color">6</td>
							<td class="general row_color">6.5</td>
							<td class="general row_color">40</td>
							<td class="general row_color">40.5</td>
							<td class="general row_color">25.5</td>
						</tr>
						<tr>
							<td class="general">9</td>
							<td class="general">8</td>
							<td class="general">6.5</td>
							<td class="general">7</td>
							<td class="general">40.5</td>
							<td class="general">41</td>
							<td class="general">26</td>
						</tr>
						<tr>
							<td class="general row_color">9.5</td>
							<td class="general row_color">8.5</td>
							<td class="general row_color">7</td>
							<td class="general row_color">7.5</td>
							<td class="general row_color">41</td>
							<td class="general row_color">42</td>
							<td class="general row_color">26.5</td>
						</tr>
						<tr>
							<td class="general">10</td>
							<td class="general">9</td>
							<td class="general">7.5</td>
							<td class="general">8</td>
							<td class="general">42</td>
							<td class="general">42.5</td>
							<td class="general">27</td>
						</tr>
						<tr>
							<td class="general row_color">10.5</td>
							<td class="general row_color">9.5</td>
							<td class="general row_color">8</td>
							<td class="general row_color">8.5</td>
							<td class="general row_color">42.5</td>
							<td class="general row_color">43</td>
							<td class="general row_color">27.5</td>
						</tr>
						<tr>
							<td class="general">11</td>
							<td class="general">10</td>
							<td class="general">8.5</td>
							<td class="general">9</td>
							<td class="general">43</td>
							<td class="general">44</td>
							<td class="general">28</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">10.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">9.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">44.5</td>
							<td class="general row_color">28.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">11</td>
							<td class="general"></td>
							<td class="general">10</td>
							<td class="general"></td>
							<td class="general">45</td>
							<td class="general">29</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">11.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">10.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">45.5</td>
							<td class="general row_color">29.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">12</td>
							<td class="general"></td>
							<td class="general">11</td>
							<td class="general"></td>
							<td class="general">46</td>
							<td class="general">30</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">12.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">11.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">47</td>
							<td class="general row_color">30.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">13</td>
							<td class="general"></td>
							<td class="general">12</td>
							<td class="general"></td>
							<td class="general">47.5</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">13.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">12.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">48</td>
							<td class="general row_color">31.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">14</td>
							<td class="general"></td>
							<td class="general">13</td>
							<td class="general"></td>
							<td class="general">48.5</td>
							<td class="general">32</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">15</td>
							<td class="general row_color"></td>
							<td class="general row_color">14</td>
							<td class="general row_color"></td>
							<td class="general row_color">49.5</td>
							<td class="general row_color">33</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<a name="Nike">
					<p class="p_title">Nike Sizes </p>
				</a>
				<p class="p_bold">Men</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">35-38</td>
							<td class="general">29-31</td>
							<td class="general">35-38</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">38-41</td>
							<td class="general row_color">31-34</td>
							<td class="general row_color">38-40</td>
							<td class="general row_color">32</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">41-44</td>
							<td class="general">34-37</td>
							<td class="general">41-43</td>
							<td class="general">33</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">44-47</td>
							<td class="general row_color">37-41</td>
							<td class="general row_color">43-46</td>
							<td class="general row_color">34</td>
						</tr>
						<tr>
							<td class="general">2X-Large</td>
							<td class="general">47-50</td>
							<td class="general">41-44</td>
							<td class="general">46-49</td>
							<td class="general">35</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Women</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">31-33</td>
							<td class="general">23-25</td>
							<td class="general">33-35</td>
							<td class="general">30</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">33-36</td>
							<td class="general row_color">25-28</td>
							<td class="general row_color">35-38</td>
							<td class="general row_color">30.5</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">36-39</td>
							<td class="general">28-31</td>
							<td class="general">38-41</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">39-42</td>
							<td class="general row_color">31-34</td>
							<td class="general row_color">41-44</td>
							<td class="general row_color">31.5</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">42-45</td>
							<td class="general">34-37</td>
							<td class="general">44-47</td>
							<td class="general">32</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Youth</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">25-26</td>
							<td class="general">22-24</td>
							<td class="general">25-27</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">26-28</td>
							<td class="general row_color">24-25</td>
							<td class="general row_color">27-29</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">28-30</td>
							<td class="general">25-26</td>
							<td class="general">29-31</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">30-32</td>
							<td class="general row_color">26-27</td>
							<td class="general row_color">31-33</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">32-35</td>
							<td class="general">27-29</td>
							<td class="general">33-35</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Little Kids</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Height</th>
							<th class="subject2 header_color">Waist</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">39-42</td>
							<td class="general">36-41</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">42-45</td>
							<td class="general row_color">41-46</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">46-49</td>
							<td class="general">47-51</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">49-50</td>
							<td class="general row_color">52-55</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Toddlers</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Height</th>
							<th class="subject2 header_color">Waist</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">33-35</td>
							<td class="general">29-31</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">36-38</td>
							<td class="general row_color">32-36</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">39-41</td>
							<td class="general">37-40</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Socks   (by Shoe Sizes)</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Men</th>
							<th class="subject2 header_color">Women</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">12T-2</td>
							<td class="general">1-4</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">2-5</td>
							<td class="general row_color">3-6</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">5-8</td>
							<td class="general">7-10</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">9-12</td>
							<td class="general row_color">11-14</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Shinguards</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Length</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">XX-Small</td>
							<td class="general">8 in.</td>
						</tr>
						<tr>
							<td class="general row_color">X-Smalll</td>
							<td class="general row_color">9 in.</td>
						</tr>
						<tr>
							<td class="general">Small</td>
							<td class="general">10 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">11 in.</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">12 in.</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">13 in.</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Footwear(Shoes)</p>
				<table class="table_jy">
					<thead>
						<tr class="thin_border_bottom">
							<th colspan="2" class="subject2_c header_color thin_border_right">U.S.</th>
							<th colspan="2" class="subject2_c header_color thin_border_right">U.K.</th>
							<th colspan="2" class="subject2_c header_color thin_border_right">Europe</th>
							<th rowspan="2" class="subject2_c header_color" style="vertical-align: middle;">cm</th>
						</tr>
						<tr>
							<th class="subject2_c header_color">Women</th>
							<th class="subject2_c header_color thin_border_right">Men</th>
							<th class="subject2_c header_color">Women</th>
							<th class="subject2_c header_color thin_border_right">Men</th>
							<th class="subject2_c header_color">Women</th>
							<th class="subject2_c header_color thin_border_right">Men</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">5</td>
							<td class="general"></td>
							<td class="general">2.5</td>
							<td class="general"></td>
							<td class="general">35.5</td>
							<td class="general"></td>
							<td class="general">22</td>
						</tr>
						<tr>
							<td class="general row_color">5.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">3</td>
							<td class="general row_color"></td>
							<td class="general row_color">36</td>
							<td class="general row_color"></td>
							<td class="general row_color">22.5</td>
						</tr>
						<tr>
							<td class="general">6</td>
							<td class="general"></td>
							<td class="general">3.5</td>
							<td class="general"></td>
							<td class="general">36.5</td>
							<td class="general"></td>
							<td class="general">23</td>
						</tr>
						<tr>
							<td class="general row_color">6.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">4</td>
							<td class="general row_color"></td>
							<td class="general row_color">37.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">23.5</td>
						</tr>
						<tr>
							<td class="general">7</td>
							<td class="general">6</td>
							<td class="general">4.5</td>
							<td class="general">5</td>
							<td class="general">38</td>
							<td class="general">39</td>
							<td class="general">24</td>
						</tr>
						<tr>
							<td class="general row_color">7.5</td>
							<td class="general row_color">6.5</td>
							<td class="general row_color">5</td>
							<td class="general row_color">5.5</td>
							<td class="general row_color">38.5</td>
							<td class="general row_color">39.5</td>
							<td class="general row_color">24.5</td>
						</tr>
						<tr>
							<td class="general">8</td>
							<td class="general">7</td>
							<td class="general">5.5</td>
							<td class="general">6</td>
							<td class="general">39</td>
							<td class="general">40</td>
							<td class="general">25</td>
						</tr>
						<tr>
							<td class="general row_color">8.5</td>
							<td class="general row_color">7.5</td>
							<td class="general row_color">6</td>
							<td class="general row_color">6.5</td>
							<td class="general row_color">40</td>
							<td class="general row_color">40.5</td>
							<td class="general row_color">25.5</td>
						</tr>
						<tr>
							<td class="general">9</td>
							<td class="general">8</td>
							<td class="general">6.5</td>
							<td class="general">7</td>
							<td class="general">40.5</td>
							<td class="general">41</td>
							<td class="general">26</td>
						</tr>
						<tr>
							<td class="general row_color">9.5</td>
							<td class="general row_color">8.5</td>
							<td class="general row_color">7</td>
							<td class="general row_color">7.5</td>
							<td class="general row_color">41</td>
							<td class="general row_color">42</td>
							<td class="general row_color">26.5</td>
						</tr>
						<tr>
							<td class="general">10</td>
							<td class="general">9</td>
							<td class="general">7.5</td>
							<td class="general">8</td>
							<td class="general">42</td>
							<td class="general">42.5</td>
							<td class="general">27</td>
						</tr>
						<tr>
							<td class="general row_color">10.5</td>
							<td class="general row_color">9.5</td>
							<td class="general row_color">8</td>
							<td class="general row_color">8.5</td>
							<td class="general row_color">42.5</td>
							<td class="general row_color">43</td>
							<td class="general row_color">27.5</td>
						</tr>
						<tr>
							<td class="general">11</td>
							<td class="general">10</td>
							<td class="general">8.5</td>
							<td class="general">9</td>
							<td class="general">43</td>
							<td class="general">44</td>
							<td class="general">28</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">10.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">9.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">44.5</td>
							<td class="general row_color">28.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">11</td>
							<td class="general"></td>
							<td class="general">10</td>
							<td class="general"></td>
							<td class="general">45</td>
							<td class="general">29</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">11.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">10.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">45.5</td>
							<td class="general row_color">29.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">12</td>
							<td class="general"></td>
							<td class="general">11</td>
							<td class="general"></td>
							<td class="general">46</td>
							<td class="general">30</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">12.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">11.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">47</td>
							<td class="general row_color">30.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">13</td>
							<td class="general"></td>
							<td class="general">12</td>
							<td class="general"></td>
							<td class="general">47.5</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">13.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">12.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">48</td>
							<td class="general row_color">31.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">14</td>
							<td class="general"></td>
							<td class="general">13</td>
							<td class="general"></td>
							<td class="general">48.5</td>
							<td class="general">32</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">15</td>
							<td class="general row_color"></td>
							<td class="general row_color">14</td>
							<td class="general row_color"></td>
							<td class="general row_color">49.5</td>
							<td class="general row_color">33</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<a name="Puma">
					<p class="p_title">Puma Sizes</p>
				</a>
				<p class="p_bold">Men</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">35-37</td>
							<td class="general">29-31</td>
							<td class="general">36-38</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">38-40</td>
							<td class="general row_color">32-34</td>
							<td class="general row_color">39-41</td>
							<td class="general row_color">32</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">41-44</td>
							<td class="general">35-38</td>
							<td class="general">41-44</td>
							<td class="general">33</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">45-48</td>
							<td class="general row_color">39-41</td>
							<td class="general row_color">45-49</td>
							<td class="general row_color">34</td>
						</tr>
						<tr>
							<td class="general">2X-Large</td>
							<td class="general">49-55</td>
							<td class="general">42-45</td>
							<td class="general">50-54</td>
							<td class="general">35</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Women</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">30-32</td>
							<td class="general">21-23</td>
							<td class="general">31-33</td>
							<td class="general">30</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">33-34</td>
							<td class="general row_color">24-25</td>
							<td class="general row_color">34-35</td>
							<td class="general row_color">30.5</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">35-37</td>
							<td class="general">26-28</td>
							<td class="general">36-38</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">38-40</td>
							<td class="general row_color">29-31</td>
							<td class="general row_color">39-41</td>
							<td class="general row_color">31.5</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">42-45</td>
							<td class="general">32-34</td>
							<td class="general">42-45</td>
							<td class="general">32</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Youth</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">25-26</td>
							<td class="general">22-24</td>
							<td class="general">25-27</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">26-28</td>
							<td class="general row_color">24-25</td>
							<td class="general row_color">27-29</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">28-30</td>
							<td class="general">25-26</td>
							<td class="general">29-31</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">30-32</td>
							<td class="general row_color">26-27</td>
							<td class="general row_color">31-33</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">32-35</td>
							<td class="general">27-29</td>
							<td class="general">33-35</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Socks   (by Shoe Sizes)</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Men</th>
							<th class="subject2 header_color">Women</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">12T-2</td>
							<td class="general">1-4</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">2-5</td>
							<td class="general row_color">3-6</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">5-8</td>
							<td class="general">7-10</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">9-12</td>
							<td class="general row_color">11-14</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Shinguards</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Length</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">9 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">10 in.</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">11 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">12 in.</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">13 in.</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Footwear (Shoes)</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Women</th>
							<th class="subject2 header_color">Men</th>
							<th class="subject2 header_color">U.K.</th>
							<th class="subject2 header_color">Europe</th>
							<th class="subject2 header_color">Japan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">5</td>
							<td class="general">3.5</td>
							<td class="general">2.5</td>
							<td class="general">35</td>
							<td class="general">21.5</td>
						</tr>
						<tr>
							<td class="general row_color">5.5</td>
							<td class="general row_color">4</td>
							<td class="general row_color">3</td>
							<td class="general row_color">35.5</td>
							<td class="general row_color">22</td>
						</tr>
						<tr>
							<td class="general">6</td>
							<td class="general">4.5</td>
							<td class="general">3.5</td>
							<td class="general">36</td>
							<td class="general">22.5</td>
						</tr>
						<tr>
							<td class="general row_color">6.5</td>
							<td class="general row_color">5</td>
							<td class="general row_color">4</td>
							<td class="general row_color">37</td>
							<td class="general row_color">23</td>
						</tr>
						<tr>
							<td class="general">7</td>
							<td class="general">5.5</td>
							<td class="general">4.5</td>
							<td class="general">37.5</td>
							<td class="general">23.5</td>
						</tr>
						<tr>
							<td class="general row_color">7.5</td>
							<td class="general row_color">6</td>
							<td class="general row_color">5</td>
							<td class="general row_color">38</td>
							<td class="general row_color">24</td>
						</tr>
						<tr>
							<td class="general">8</td>
							<td class="general">6.5</td>
							<td class="general">5.5</td>
							<td class="general">38.5</td>
							<td class="general">24.5</td>
						</tr>
						<tr>
							<td class="general row_color">8.5</td>
							<td class="general row_color">7</td>
							<td class="general row_color">6</td>
							<td class="general row_color">39</td>
							<td class="general row_color">25</td>
						</tr>
						<tr>
							<td class="general">9</td>
							<td class="general">7.5</td>
							<td class="general">6.5</td>
							<td class="general">40</td>
							<td class="general">25.5</td>
						</tr>
						<tr>
							<td class="general row_color">9.5</td>
							<td class="general row_color">8</td>
							<td class="general row_color">7</td>
							<td class="general row_color">40.5</td>
							<td class="general row_color">26</td>
						</tr>
						<tr>
							<td class="general">10</td>
							<td class="general">8.5</td>
							<td class="general">7.5</td>
							<td class="general">41</td>
							<td class="general">26.5</td>
						</tr>
						<tr>
							<td class="general row_color">10.5</td>
							<td class="general row_color">9</td>
							<td class="general row_color">8</td>
							<td class="general row_color">42</td>
							<td class="general row_color">27</td>
						</tr>
						<tr>
							<td class="general">11</td>
							<td class="general">9.5</td>
							<td class="general">8.5</td>
							<td class="general">42.5</td>
							<td class="general">27.5</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">10</td>
							<td class="general row_color">9</td>
							<td class="general row_color">43.5</td>
							<td class="general row_color">28</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">10.5</td>
							<td class="general">9.5</td>
							<td class="general">44</td>
							<td class="general">28.5</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">11</td>
							<td class="general row_color">10</td>
							<td class="general row_color">44.5</td>
							<td class="general row_color">29</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">11.5</td>
							<td class="general">10.5</td>
							<td class="general">45</td>
							<td class="general">29.5</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">12</td>
							<td class="general row_color">11</td>
							<td class="general row_color">46</td>
							<td class="general row_color">30</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">13</td>
							<td class="general">12</td>
							<td class="general">47</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">14</td>
							<td class="general row_color">13</td>
							<td class="general row_color">48</td>
							<td class="general row_color">31.5</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>				
				<a name="Reebok">
					<p class="p_title">Reebok Sizes</p>
				</a>
				<p class="p_bold">Men</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">35-37</td>
							<td class="general">29-31</td>
							<td class="general">36-38</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">38-40</td>
							<td class="general row_color">32-34</td>
							<td class="general row_color">39-41</td>
							<td class="general row_color">32</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">41-44</td>
							<td class="general">35-38</td>
							<td class="general">41-44</td>
							<td class="general">33</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">45-48</td>
							<td class="general row_color">39-41</td>
							<td class="general row_color">45-49</td>
							<td class="general row_color">34</td>
						</tr>
						<tr>
							<td class="general">2X-Large</td>
							<td class="general">49-55</td>
							<td class="general">42-45</td>
							<td class="general">50-54</td>
							<td class="general">35</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Women</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
							<th class="subject2 header_color">Inseam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">30-32</td>
							<td class="general">21-23</td>
							<td class="general">31-33</td>
							<td class="general">30</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">33-34</td>
							<td class="general row_color">24-25</td>
							<td class="general row_color">34-35</td>
							<td class="general row_color">30.5</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">35-37</td>
							<td class="general">26-28</td>
							<td class="general">36-38</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">38-40</td>
							<td class="general row_color">29-31</td>
							<td class="general row_color">39-41</td>
							<td class="general row_color">31.5</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">42-45</td>
							<td class="general">32-34</td>
							<td class="general">42-45</td>
							<td class="general">32</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Youth</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">25-26</td>
							<td class="general">22-24</td>
							<td class="general">25-27</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">26-28</td>
							<td class="general row_color">24-25</td>
							<td class="general row_color">27-29</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">28-30</td>
							<td class="general">25-26</td>
							<td class="general">29-31</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">30-32</td>
							<td class="general row_color">26-27</td>
							<td class="general row_color">31-33</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">32-35</td>
							<td class="general">27-29</td>
							<td class="general">33-35</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Socks   (by Shoe Sizes)</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Men</th>
							<th class="subject2 header_color">Women</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">12T-2</td>
							<td class="general">1-4</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">2-5</td>
							<td class="general row_color">3-6</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">5-8</td>
							<td class="general">7-10</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">9-12</td>
							<td class="general row_color">11-14</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Shinguards</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Length</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">9 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">10 in.</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">11 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">12 in.</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">13 in.</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Footwear (Shoes)</p>
				<table class="table_jy">
					<thead>
						<tr class="thin_border_bottom">
							<th colspan="2" class="subject2_c header_color thin_border_right">U.S.</th>
							<th colspan="2" class="subject2_c header_color thin_border_right">U.K.</th>
							<th colspan="2" class="subject2_c header_color thin_border_right">Europe</th>
							<th rowspan="2" class="subject2_c header_color" style="vertical-align: middle;">cm</th>
						</tr>
						<tr>
							<th class="subject2_c header_color">Women</th>
							<th class="subject2_c header_color thin_border_right">Men</th>
							<th class="subject2_c header_color">Women</th>
							<th class="subject2_c header_color thin_border_right">Men</th>
							<th class="subject2_c header_color">Women</th>
							<th class="subject2_c header_color thin_border_right">Men</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">5</td>
							<td class="general"></td>
							<td class="general">2.5</td>
							<td class="general"></td>
							<td class="general">35</td>
							<td class="general"></td>
							<td class="general">22</td>
						</tr>
						<tr>
							<td class="general row_color">5.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">3</td>
							<td class="general row_color"></td>
							<td class="general row_color">35.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">22.5</td>
						</tr>
						<tr>
							<td class="general">6</td>
							<td class="general"></td>
							<td class="general">3.5</td>
							<td class="general"></td>
							<td class="general">36</td>
							<td class="general"></td>
							<td class="general">23</td>
						</tr>
						<tr>
							<td class="general row_color">6.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">4</td>
							<td class="general row_color"></td>
							<td class="general row_color">37</td>
							<td class="general row_color"></td>
							<td class="general row_color">23.5</td>
						</tr>
						<tr>
							<td class="general">7</td>
							<td class="general"></td>
							<td class="general">4.5</td>
							<td class="general"></td>
							<td class="general">37.5</td>
							<td class="general"></td>
							<td class="general">24</td>
						</tr>
						<tr>
							<td class="general row_color">7.5</td>
							<td class="general row_color">6.5</td>
							<td class="general row_color">5</td>
							<td class="general row_color">5.5</td>
							<td class="general row_color">38</td>
							<td class="general row_color">38.5</td>
							<td class="general row_color">24.5</td>
						</tr>
						<tr>
							<td class="general">8</td>
							<td class="general">7</td>
							<td class="general">5.5</td>
							<td class="general">6</td>
							<td class="general">38.5</td>
							<td class="general">39</td>
							<td class="general">25</td>
						</tr>
						<tr>
							<td class="general row_color">8.5</td>
							<td class="general row_color">7.5</td>
							<td class="general row_color">6</td>
							<td class="general row_color">6.5</td>
							<td class="general row_color">39</td>
							<td class="general row_color">40</td>
							<td class="general row_color">25.5</td>
						</tr>
						<tr>
							<td class="general">9</td>
							<td class="general">8</td>
							<td class="general">6.5</td>
							<td class="general">7</td>
							<td class="general">40</td>
							<td class="general">40.5</td>
							<td class="general">26</td>
						</tr>
						<tr>
							<td class="general row_color">9.5</td>
							<td class="general row_color">8.5</td>
							<td class="general row_color">7</td>
							<td class="general row_color">7.5</td>
							<td class="general row_color">40.5</td>
							<td class="general row_color">41</td>
							<td class="general row_color">26.5</td>
						</tr>
						<tr>
							<td class="general">10</td>
							<td class="general">9</td>
							<td class="general">7.5</td>
							<td class="general">8</td>
							<td class="general">41</td>
							<td class="general">42</td>
							<td class="general">27</td>
						</tr>
						<tr>
							<td class="general row_color">10.5</td>
							<td class="general row_color">9.5</td>
							<td class="general row_color">8</td>
							<td class="general row_color">8.5</td>
							<td class="general row_color">42</td>
							<td class="general row_color">42.5</td>
							<td class="general row_color">27.5</td>
						</tr>
						<tr>
							<td class="general">11</td>
							<td class="general">10</td>
							<td class="general">8.5</td>
							<td class="general">9</td>
							<td class="general">42.5</td>
							<td class="general">43</td>
							<td class="general">28</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">10.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">9.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">44</td>
							<td class="general row_color">28.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">11</td>
							<td class="general"></td>
							<td class="general">10</td>
							<td class="general"></td>
							<td class="general">44.5</td>
							<td class="general">29</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">11.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">10.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">45</td>
							<td class="general row_color">29.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">12</td>
							<td class="general"></td>
							<td class="general">11</td>
							<td class="general"></td>
							<td class="general">45.5</td>
							<td class="general">30</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">12.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">11.5</td>
							<td class="general row_color"></td>
							<td class="general row_color">46</td>
							<td class="general row_color">30.5</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">13</td>
							<td class="general"></td>
							<td class="general">12</td>
							<td class="general"></td>
							<td class="general">47</td>
							<td class="general">31</td>
						</tr>
						<tr>
							<td class="general row_color"></td>
							<td class="general row_color">14</td>
							<td class="general row_color"></td>
							<td class="general row_color">13</td>
							<td class="general row_color"></td>
							<td class="general row_color">48.5</td>
							<td class="general row_color">32</td>
						</tr>
						<tr>
							<td class="general"></td>
							<td class="general">15</td>
							<td class="general"></td>
							<td class="general">14</td>
							<td class="general"></td>
							<td class="general">50</td>
							<td class="general">33</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<a name="Rhinox">
					<p class="p_title">Rhinox Sizes</p>
				</a>
				<p class="p_bold">Adult Men</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color"></th>
                      		<th class="subject2 header_color"></th>
                      		<th class="subject2 header_color">S</th>
                      		<th class="subject2 header_color">M</th>
                      		<th class="subject2 header_color">L</th>
                      		<th class="subject2 header_color">XL</th>
                      		<th class="subject2 header_color">XXL</th>
						</tr>
					</thead>
					<tbody>
						<tr>
	                    	<th rowspan="3" class="general" style="vertical-align: middle;">Jerseys / Shirts</th>
	                      	<td class="general">Chest</td>
	                      	<td class="general">21 3/4</td>
	                      	<td class="general">22 3/4</td>
	                      	<td class="general">23 3/4</td>
	                      	<td class="general">24 3/4</td>
	                      	<td class="general">25 3/4</td>
	                    </tr>
	                    <tr>
	                      	<td class="general">Length</td>
	                      	<td class="general">27 3/4</td>
	                      	<td class="general">28 2/4</td>
	                      	<td class="general">29 1/4</td>
	                      	<td class="general">30</td>
	                      	<td class="general">31</td>
	                    </tr>
	                    <tr>
	                      	<td class="general">Sleeve Length</td>
	                      	<td class="general">9</td>
	                      	<td class="general">9 2/4</td>
	                      	<td class="general">9 3/4</td>
	                      	<td class="general">10 1/4</td>
	                      	<td class="general">10 3/4</td>
	                    </tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Youth Boys</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color"></th>
                      		<th class="subject2 header_color"></th>
                      		<th class="subject2 header_color">S</th>
                      		<th class="subject2 header_color">M</th>
                      		<th class="subject2 header_color">L</th>
                      		<th class="subject2 header_color">XL</th>
						</tr>
					</thead>
					<tbody>
						<tr>
	                    	<th rowspan="3" class="general" style="vertical-align: middle;">Jerseys / Shirts</th>
	                      	<td class="general">Chest</td>
	                      	<td class="general">16 3/4</td>
	                      	<td class="general">17 3/4</td>
	                      	<td class="general">18 3/4</td>
	                      	<td class="general">19 3/4</td>
	                    </tr>
	                    <tr>
	                      	<td class="general">Length</td>
	                      	<td class="general">23 1/4</td>
	                      	<td class="general">24</td>
	                      	<td class="general">24 3/4</td>
	                      	<td class="general">25 2/4</td>
	                    </tr>
	                    <tr>
	                      	<td class="general">Sleeve Length</td>
	                      	<td class="general">7 1/4</td>
	                      	<td class="general">7 2/4</td>
	                      	<td class="general">8</td>
	                      	<td class="general">8 1/4</td>
	                    </tr>
					</tbody>
				</table>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<a name="Umbro">
					<p class="p_title">Umbro Sizes</p>
				</a>
				<p class="p_bold">Men</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">34-36</td>
							<td class="general">26-28</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">38-40</td>
							<td class="general row_color">30-32</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">42-44</td>
							<td class="general">34-36</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">46-48</td>
							<td class="general row_color">38-40</td>
						</tr>
						<tr>
							<td class="general">2X-Large</td>
							<td class="general">50-52</td>
							<td class="general">42-44</td>
						</tr>
						<tr>
							<td class="general row_color">3X-Large</td>
							<td class="general row_color">54-56</td>
							<td class="general row_color">46-48</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Women</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
							<th class="subject2 header_color">Hip</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">32-34</td>
							<td class="general">24-26</td>
							<td class="general">34-36</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">34-36</td>
							<td class="general row_color">26-28</td>
							<td class="general row_color">36-38</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">36-38</td>
							<td class="general">28-30</td>
							<td class="general">38-40</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">38-40</td>
							<td class="general row_color">30-32</td>
							<td class="general row_color">40-42</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">40-43</td>
							<td class="general">32-35</td>
							<td class="general">42-45</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Youth</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Chest</th>
							<th class="subject2 header_color">Waist</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">26-28</td>
							<td class="general">22-24</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">28-30</td>
							<td class="general row_color">24-26</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">30-32</td>
							<td class="general">26-28</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">32-34</td>
							<td class="general row_color">28-30</td>
						</tr>
						<tr>
							<td class="general">2X-Large</td>
							<td class="general">50-52</td>
							<td class="general">42-44</td>
						</tr>
						<tr>
							<td class="general row_color">3X-Large</td>
							<td class="general row_color">54-56</td>
							<td class="general row_color">46-48</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Little Kids</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Height</th>
							<th class="subject2 header_color">Weight</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">39-42</td>
							<td class="general">36-41</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">42-45</td>
							<td class="general row_color">41-46</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">46-49</td>
							<td class="general">47-51</td>
						</tr>
						<tr>
							<td class="general row_color">X-Large</td>
							<td class="general row_color">49-50</td>
							<td class="general row_color">52-55</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Toddlers</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Height</th>
							<th class="subject2 header_color">Weight</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">Small</td>
							<td class="general">33-35</td>
							<td class="general">29-31</td>
						</tr>
						<tr>
							<td class="general row_color">Medium</td>
							<td class="general row_color">36-38</td>
							<td class="general row_color">32-36</td>
						</tr>
						<tr>
							<td class="general">Large</td>
							<td class="general">39-41</td>
							<td class="general">37-40</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Socks   (by Shoe Sizes)</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Men</th>
							<th class="subject2 header_color">Women</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">12T-2</td>
							<td class="general">1-4</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">2-5</td>
							<td class="general row_color">4-7</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">5-9</td>
							<td class="general">7-10</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">9 +</td>
							<td class="general row_color">10 +</td>
						</tr>
					</tbody>
				</table>
				<br/>
				<p class="p_bold">Shinguards</p>
				<table class="table_jy">
					<thead>
						<tr>
							<th class="subject2 header_color">Size</th>
							<th class="subject2 header_color">Length</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="general">X-Small</td>
							<td class="general">9 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Small</td>
							<td class="general row_color">10 in.</td>
						</tr>
						<tr>
							<td class="general">Medium</td>
							<td class="general">11 in.</td>
						</tr>
						<tr>
							<td class="general row_color">Large</td>
							<td class="general row_color">12 in.</td>
						</tr>
						<tr>
							<td class="general">X-Large</td>
							<td class="general">13 in.</td>
						</tr>
					</tbody>
				</table>
				<br/>
			</div>
		</div>
	</div>
</div>
<!-- col-md-9 CLOSE -->

</div>
<!-- container CLOSE -->

<!--
<td width="700" align="center">
      <table width="680" border="0" cellpadding="0" cellspacing="0" class="arial11" style="border:#c3c3c3 1px solid;">
        <tbody><tr>
          <td align="left" valign="top">
           <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="arial11">
              <tbody>
               <tr height="22" bgcolor="#870179"><td class="arial12_white">&nbsp; <b>Size Charts of Soccer Balls</b></td></tr>
              <tr height="20"><td></td></tr>
              <tr>
            <td style="padding-left:10px;padding-right:8px;">
                  <table width="80%" border="0" cellspacing="0" cellpadding="0" style="border:#cccccc 1px solid;">
                    <tbody><tr height="16" bgcolor="#d9d9d9" class="arial12">
                      <th align="center" style="border-right:#cccccc 1px solid;border-bottom:#ccc 1px solid">Ball Size</th>
                      <th align="center" style="border-right:#cccccc 1px solid;border-bottom:#ccc 1px solid">Player Age <font color="red">*</font></th>
                      <th align="center" style="border-bottom:#ccc 1px solid">Ball Circumference</th>
                    </tr>
                    <tr height="16" bgcolor="#ffffff" align="center">
                      <td style="border-right:#cccccc 1px solid;border-bottom:#ccc 1px solid">1 / Mini / Skills</td>
                      <td style="border-right:#cccccc 1px solid;border-bottom:#ccc 1px solid">All ages</td>
                      <td style="border-bottom:#ccc 1px solid">18" - 20"</td>
                    </tr>
                    <tr height="16" bgcolor="#ffffff" align="center">
                      <td style="border-right:#cccccc 1px solid;border-bottom:#ccc 1px solid">2 / Midi</td>
                      <td style="border-right:#cccccc 1px solid;border-bottom:#ccc 1px solid">All ages</td>
                      <td style="border-bottom:#ccc 1px solid">20" - 22"</td>
                    </tr>
                    <tr height="16" bgcolor="#ffffff" align="center">
                      <td style="border-right:#cccccc 1px solid;border-bottom:#ccc 1px solid">3</td>
                      <td style="border-right:#cccccc 1px solid;border-bottom:#ccc 1px solid">Under 8</td>
                      <td style="border-bottom:#ccc 1px solid">23" - 24"</td>
                    </tr>
                    <tr height="16" bgcolor="#ffffff" align="center">
                      <td style="border-right:#cccccc 1px solid;border-bottom:#ccc 1px solid">4</td>
                      <td style="border-right:#cccccc 1px solid;border-bottom:#ccc 1px solid">8 - 12</td>
                      <td style="border-bottom:#ccc 1px solid">25" - 26"</td>
                    </tr>
                    <tr height="16" bgcolor="#ffffff" align="center">
                      <td style="border-right:#cccccc 1px solid;">5</td>
                      <td style="border-right:#cccccc 1px solid;">12 and up</td>
                      <td>27" - 28"</td>
                    </tr>
                  </tbody></table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr><td><font color="red">*</font> Consult with your coach or team manager to determine a ball size that is right for you.</td></tr>
                  </tbody></table>
                </td> 
              </tr>
              <tr height="25"><td></td></tr>
              <tr height="22" bgcolor="#870179"><td class="arial12_white">&nbsp; <b>Size Charts of Major Brands</b></td></tr>
              <tr height="5"><td></td></tr>
              <tr>
                <td style="padding-left:8px;">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="arial12">
                    <tbody><tr><td width="6%">for :</td><td>1. <b>Jerseys, Shorts &amp; Pants</b></td></tr>
                    <tr><td></td><td>2. <b>Socks</b></td></tr>
                    <tr><td></td><td>3. <b>Shinguards</b></td></tr>
                    <tr><td></td><td>4. <b>Shoes</b></td></tr>
                  </tbody></table>
                </td>
              </tr>
              <tr height="20"><td></td></tr>
              <tr>
                <td style="padding-left:10px;padding-right:8px;">
                  <font class="arial12">Click one below to see its size specifications:</font>
                  <br><br style="line-height:5px;">
                  <font class="arial12bold">
                  &nbsp; &nbsp; &nbsp; <a href="#Guidelines">General Guidelines of Sizes</a><br><br style="line-height:3px;">
                  &nbsp; &nbsp; &nbsp; <a href="#Adidas">Adidas</a><br>
                  &nbsp; &nbsp; &nbsp; <a href="#Diadora">Diadora</a><br>
                  &nbsp; &nbsp; &nbsp; <a href="#Joma">Joma</a><br>
                  &nbsp; &nbsp; &nbsp; <a href="#Kelme">Kelme</a><br>
                  &nbsp; &nbsp; &nbsp; <a href="#Nike">Nike</a><br>
                  &nbsp; &nbsp; &nbsp; <a href="#Puma">Puma</a><br>
                  &nbsp; &nbsp; &nbsp; <a href="#Reebok">Reebok</a><br>
                  &nbsp; &nbsp; &nbsp; <a href="#Rhinox">Rhinox</a><br>
                  &nbsp; &nbsp; &nbsp; <a href="#Umbro">Umbro</a>
                  </font>
                  <br><br><br><br>
                  <a name="Guidelines"><font class="arial12bold" style="color:blue;">General Guidelines of Sizes</font></a>
                  <br><br>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr><th></th><th colspan="7"><li>Men</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th></th><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td></td><td>Small</td><td>35-38</td><td>29-31</td><td>35-38</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Medium</td><td>38-41</td><td>31-34</td><td>38-40</td><td>32</td></tr>
                    <tr><td></td><td>Large</td><td>41-44</td><td>34-37</td><td>41-43</td><td>33</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>X-Large</td><td>44-47</td><td>37-41</td><td>43-46</td><td>34</td></tr>
                    <tr><td></td><td>2X-Large</td><td>47-50</td><td>41-44</td><td>46-49</td><td>35</td></tr>
                    <tr height="10"><td colspan="8"></td></tr>

                    <tr><th></th><th colspan="7"><li>Women</li></th></tr>
                    <tr bgcolor="#dbdbdb"><td></td><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td></td><td>X-Small</td><td>31-33</td><td>23-25</td><td>33-35</td><td>30</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Small</td><td>33-36</td><td>25-28</td><td>35-38</td><td>30.5</td></tr>
                    <tr><td></td><td>Medium</td><td>36-39</td><td>28-31</td><td>38-41</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Large</td><td>39-42</td><td>31-34</td><td>41-44</td><td>31.5</td></tr>
                    <tr><td></td><td>X-Large</td><td>42-45</td><td>34-37</td><td>44-47</td><td>32</td></tr>
                    <tr height="10"><td colspan="8"></td></tr>

                    <tr><th></th><th colspan="7"><li>Youth</li></th></tr>
                    <tr bgcolor="#dbdbdb"><td></td><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th></tr>
                    <tr><td></td><td>X-Small</td><td>25-26</td><td>22-24</td><td>25-27</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Small</td><td>26-28</td><td>24-25</td><td>27-29</td></tr>
                    <tr><td></td><td>Medium</td><td>28-30</td><td>25-26</td><td>29-31</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Large</td><td>30-32</td><td>26-27</td><td>31-33</td></tr>
                    <tr><td></td><td>X-Large</td><td>32-35</td><td>27-29</td><td>33-35</td></tr>
                    <tr height="10"><td colspan="8"></td></tr>

                    <tr><th></th><th colspan="7"><li>Little Kids</li></th></tr>
                    <tr bgcolor="#dbdbdb"><td></td><th>Size</th><th>Height</th><th>Weight</th></tr>
                    <tr><td></td><td>Small</td><td>39-42</td><td>36-41</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Medium</td><td>42-45</td><td>41-46</td></tr>
                    <tr><td></td><td>Large</td><td>46-49</td><td>47-51</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>X-Large</td><td>49-50</td><td>52-55</td></tr>
                    <tr height="10"><td colspan="8"></td></tr>

                    <tr><th></th><th colspan="7"><li>Toddlers</li></th></tr>
                    <tr bgcolor="#dbdbdb"><td></td><th>Size</th><th>Height</th><th>Weight</th></tr>
                    <tr><td></td><td>Small</td><td>33-35</td><td>29-31</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Medium</td><td>36-38</td><td>32-36</td></tr>
                    <tr><td></td><td>Large</td><td>39-41</td><td>37-40</td></tr>
                    <tr height="10"><td colspan="8"></td></tr>

                    <tr><th></th><th colspan="7"><li>Socks &nbsp; (by Shoe Sizes)</li></th></tr>
                    <tr bgcolor="#dbdbdb"><td></td><th>Size</th><th>Men</th><th>Women</th></tr>
                    <tr><td></td><td>X-Small</td><td>12T-2</td><td>1-4</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Small</td><td>1-4</td><td>3-6</td></tr>
                    <tr><td></td><td>Medium</td><td>5-8</td><td>7-10</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Large</td><td>9-12</td><td>11-14</td></tr>
                    <tr height="10"><td colspan="8"></td></tr>

                    <tr><th></th><th colspan="7"><li>Shinguards</li></th></tr>
                    <tr bgcolor="#dbdbdb"><td></td><th>Size</th><th>Length</th></tr>
                    <tr><td></td><td>X-Small</td><td>9 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Small</td><td>10 in.</td></tr>
                    <tr><td></td><td>Medium</td><td>11 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Large</td><td>12 in.</td></tr>
                    <tr><td></td><td>X-Large</td><td>13 in.</td></tr>
                    <tr height="10"><td colspan="8"></td></tr>

                    <tr><th colspan="8"><li>Kids' Footwear (Shoes)</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th></th><th>U.S.</th><th>U.K.</th><th>Europe</th><th>cm</th></tr>
                    <tr><td></td><td>9</td><td>8</td><td>25</td><td>15.6</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>9.5</td><td>8.5</td><td>26</td><td>15.9</td></tr>
                    <tr><td></td><td>10</td><td>9</td><td>27</td><td>16.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>10.5</td><td>9.5</td><td>27</td><td>16.8</td></tr>
                    <tr><td></td><td>11</td><td>10</td><td>28</td><td>17.1</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>11.5</td><td>10.5</td><td>29</td><td>17.8</td></tr>
                    <tr><td></td><td>12</td><td>11</td><td>30</td><td>18.1</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>12.5</td><td>11.5</td><td>30</td><td>18.4</td></tr>
                    <tr><td></td><td>13</td><td>12</td><td>31</td><td>19.1</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>13.5</td><td>12.5</td><td>31</td><td>19.4</td></tr>
                    <tr><td></td><td>1</td><td>13</td><td>32</td><td>19.7</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>1.5</td><td>14</td><td>33</td><td>20.3</td></tr>
                    <tr><td></td><td>2</td><td>1</td><td>33</td><td>20.6</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>2.5</td><td>1.5</td><td>34</td><td>21.0</td></tr>
                    <tr><td></td><td>3</td><td>2</td><td>34</td><td>21.6</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>3.5</td><td>2.5</td><td>35</td><td>21.9</td></tr>
                    <tr><td></td><td>4</td><td>3</td><td>36</td><td>22.2</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>4.5</td><td>3.5</td><td>36</td><td>22.9</td></tr>
                    <tr><td></td><td>5</td><td>4</td><td>37</td><td>23.2</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>5.5</td><td>4.5</td><td>37</td><td>23.5</td></tr>
                    <tr height="10"><td colspan="8"></td></tr>

                    <tr><th colspan="8"><li>Adults' Footwear (Shoes)</li></th></tr>
                    <tr bgcolor="#dbdbdb">
                      <td></td>
                      <th colspan="2" align="center">U.S.</th>
                      <th colspan="2" align="center">U.K.</th>
                      <th colspan="2" align="center">Europe</th>
                      <th>cm</th>
                    </tr>
                    <tr bgcolor="#dbdbdb">
                      <td></td>
                      <th>Women</th><th>Men</th>
                      <th>Women </th><th>Men</th>
                      <th>Women </th><th>Men </th>
                      <th></th>
                    </tr>
                    <tr>
                      <td></td>
                      <td>5</td><td></td>
                      <td>2.5</td><td></td>
                      <td>35.5</td><td></td>
                      <td>22</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td>5.5</td><td></td>
                      <td>3</td><td></td>
                      <td>36</td><td></td>
                      <td>22.5</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>6</td><td></td>
                      <td>3.5</td><td></td>
                      <td>36.5</td><td></td>
                      <td>23</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td>6.5</td><td></td>
                      <td>4</td><td></td>
                      <td>37.5</td><td></td>
                      <td>23.5</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>7</td><td>6</td>
                      <td>4.5</td><td>5</td>
                      <td>38</td><td>39</td>
                      <td>24</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td>7.5</td><td>6.5</td>
                      <td>5</td><td>5.5</td>
                      <td>38.5</td><td>39.5</td>
                      <td>24.5</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>8</td><td>7</td>
                      <td>5.5</td><td>6</td>
                      <td>39</td><td>40</td>
                      <td>25</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td>8.5</td><td>7.5</td>
                      <td>6</td><td>6.5</td>
                      <td>40</td><td>40.5</td>
                      <td>25.5</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>9</td><td>8</td>
                      <td>6.5</td><td>7</td>
                      <td>40.5</td><td>41</td>
                      <td>26</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td>9.5</td><td>8.5</td>
                      <td>7</td><td>7.5</td>
                      <td>41</td><td>42</td>
                      <td>26.5</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>10</td><td>9</td>
                      <td>7.5</td><td>8</td>
                      <td>42</td><td>42.5</td>
                      <td>27</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td>10.5</td><td>9.5</td>
                      <td>8</td><td>8.5</td>
                      <td>42.5</td><td>43</td>
                      <td>27.5</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>11</td><td>10</td>
                      <td>8.5</td><td>9</td>
                      <td>43</td><td>44</td>
                      <td>28</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td></td><td>10.5</td>
                      <td></td><td>9.5</td>
                      <td></td><td>44.5</td>
                      <td>28.5</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td><td>11</td>
                      <td></td><td>10</td>
                      <td></td><td>45</td>
                      <td>29</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td></td><td>11.5</td>
                      <td></td><td>10.5</td>
                      <td></td><td>45.5</td>
                      <td>29.5</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td><td>12</td>
                      <td></td><td>11</td>
                      <td></td><td>46</td>
                      <td>30</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td></td><td>12.5</td>
                      <td></td><td>11.5</td>
                      <td></td><td>47</td>
                      <td>30.5</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td><td>13</td>
                      <td></td><td>12</td>
                      <td></td><td>47.5</td>
                      <td>31</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td></td><td>13.5</td>
                      <td></td><td>12.5</td>
                      <td></td><td>48</td>
                      <td>31.5</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td><td>14</td>
                      <td></td><td>13</td>
                      <td></td><td>48.5</td>
                      <td>32</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td></td><td>15</td>
                      <td></td><td>14</td>
                      <td></td><td>49.5</td>
                      <td>33</td>
                    </tr>
                  </tbody></table>
                  <br><br>

                  <a name="Adidas"><img src="images/BrandLogos/Logo_Adidas.gif" align="middle"> <font class="arial12bold" style="color:blue;">Adidas Sizes</font></a>
                  <br><br>

                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr><th colspan="5"><li>Men</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td>Small</td><td>34-36</td><td>28-31</td><td>34-36</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>38-40</td><td>31-34</td><td>38-40</td><td>32</td></tr>
                    <tr><td>Large</td><td>42-44</td><td>35-38</td><td>42-44</td><td>33</td></tr>
                    <tr bgcolor="#F0F0F0"><td>X-Large</td><td>46-48</td><td>39-41</td><td>46-48</td><td>34</td></tr>
                    <tr><td>2X-Large</td><td>48-50</td><td>42-44</td><td>48-50</td><td>35</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Women</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td>X-Small</td><td>31-32</td><td>23-25</td><td>33-35</td><td>30</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>33-35</td><td>25-27</td><td>36-38</td><td>30.5</td></tr>
                    <tr><td>Medium</td><td>36-38</td><td>28-30</td><td>39-41</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>39-41</td><td>31-33</td><td>42-44</td><td>31.5</td></tr>
                    <tr><td>X-Large</td><td>42-44</td><td>34-36</td><td>45-47</td><td>32</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Youth</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Height</th><th>Weight</th></tr>
                    <tr><td>Small</td><td>50-53</td><td>55-75</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>54-59</td><td>76-95</td></tr>
                    <tr><td>Large</td><td>60-64</td><td>96-117</td></tr>
                    <tr bgcolor="#F0F0F0"><td>X-Large</td><td>64-68</td><td>118-138</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Little Kids</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Height</th><th>Weight</th></tr>
                    <tr><td>Small</td><td>39-42</td><td>36-41</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>42-45</td><td>41-46</td></tr>
                    <tr><td>Large</td><td>46-49</td><td>47-51</td></tr>
                    <tr bgcolor="#F0F0F0"><td>X-Large</td><td>49-50</td><td>52-55</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Toddlers</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Height</th><th>Weight</th></tr>
                    <tr><td>Small</td><td>33-35</td><td>29-31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>36-38</td><td>32-36</td></tr>
                    <tr><td>Large</td><td>39-41</td><td>37-40</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Socks &nbsp; (by Shoe Sizes)</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Men</th><th>Women</th></tr>
                    <tr><td>X-Small</td><td>12T-2</td><td>1-4</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>2-5</td><td>4-7</td></tr>
                    <tr><td>Medium</td><td>5-9</td><td>7-10</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>9 +</td><td>10 +</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="4"><li>Shinguards</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Length</th></tr>
                    <tr><td>X-Small</td><td>9 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>10 in.</td></tr>
                    <tr><td>Medium</td><td>11 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>12 in.</td></tr>
                    <tr><td>X-Large</td><td>13 in.</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Footwear (Shoes)</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Women</th><th>Men</th><th>U.K.</th><th>Europe</th><th>Japan</th></tr>
                    <tr><td>5</td><td>4</td><td>3.5</td><td>36</td><td>22</td></tr>
                    <tr bgcolor="#F0F0F0"><td>5.5</td><td>4.5</td><td>4</td><td>36.67</td><td>22.5</td></tr>
                    <tr><td>6</td><td>5</td><td>4.5</td><td>37.33</td><td>23</td></tr>
                    <tr bgcolor="#F0F0F0"><td>6.5</td><td>5.5</td><td>5</td><td>38</td><td>23.5</td></tr>
                    <tr><td>7</td><td>6</td><td>5.5</td><td>38.67</td><td>24</td></tr>
                    <tr bgcolor="#F0F0F0"><td>7.5</td><td>6.5</td><td>6</td><td>39.33</td><td>24.5</td></tr>
                    <tr><td>8</td><td>7</td><td>6.5</td><td>40</td><td>25</td></tr>
                    <tr bgcolor="#F0F0F0"><td>8.5</td><td>7.5</td><td>7</td><td>40.67</td><td>25.5</td></tr>
                    <tr><td>9</td><td>8</td><td>7.5</td><td>41.33</td><td>26</td></tr>
                    <tr bgcolor="#F0F0F0"><td>9.5</td><td>8.5</td><td>8</td><td>42</td><td>26.5</td></tr>
                    <tr><td>10</td><td>9</td><td>8.5</td><td>42.67</td><td>27</td></tr>
                    <tr bgcolor="#F0F0F0"><td>10.5</td><td>9.5</td><td>9</td><td>43.33</td><td>27.5</td></tr>
                    <tr><td>11</td><td>10</td><td>9.5</td><td>44</td><td>28</td></tr>
                    <tr bgcolor="#F0F0F0"><td>11.5</td><td>10.5</td><td>10</td><td>44.67</td><td>28.5</td></tr>
                    <tr><td>12</td><td>11</td><td>10.5</td><td>45.33</td><td>29</td></tr>
                    <tr bgcolor="#F0F0F0"><td>12.5</td><td>11.5</td><td>11</td><td>46</td><td>29.5</td></tr>
                    <tr><td>13</td><td>12</td><td>11.5</td><td>46.67</td><td>30</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>12.5</td><td>12</td><td>47.33</td><td>30.5</td></tr>
                    <tr><td></td><td>13</td><td>12.5</td><td>48</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>13.5</td><td>13</td><td>48.67</td><td>31.5</td></tr>
                    <tr><td></td><td>14</td><td>13.5</td><td>49.33</td><td>32</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>14.5</td><td>14</td><td>50</td><td>32.5</td></tr>
                    <tr><td></td><td>15</td><td>14.5</td><td>47.33</td><td>33</td></tr>
                  </tbody></table>
                  <br><br>

                  <a name="Diadora"><img src="images/BrandLogos/Logo_Diadora.gif" align="middle"> &nbsp; <font class="arial12bold" style="color:blue;">Diadora Sizes</font></a>
                  <br><br>

                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr><th></th><th colspan="5"><li>Men</li></th></tr>
                    <tr bgcolor="#dbdbdb"><td></td><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td></td><td>Small</td><td>35-37</td><td>29-31</td><td>36-38</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Medium</td><td>38-40</td><td>32-34</td><td>39-41</td><td>32</td></tr>
                    <tr><td></td><td>Large</td><td>41-44</td><td>35-38</td><td>41-44</td><td>33</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>X-Large</td><td>45-48</td><td>39-41</td><td>45-49</td><td>34</td></tr>
                    <tr><td></td><td>2X-Large</td><td>49-55</td><td>42-45</td><td>50-54</td><td>35</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th></th><th colspan="5"><li>Women</li></th></tr>
                    <tr bgcolor="#dbdbdb"><td></td><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td></td><td>X-Small</td><td>30-32</td><td>21-23</td><td>31-33</td><td>30</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Small</td><td>33-34</td><td>24-25</td><td>34-35</td><td>30.5</td></tr>
                    <tr><td></td><td>Medium</td><td>35-37</td><td>26-28</td><td>36-38</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Large</td><td>38-40</td><td>29-31</td><td>39-41</td><td>31.5</td></tr>
                    <tr><td></td><td>X-Large</td><td>42-45</td><td>32-34</td><td>42-45</td><td>32</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th></th><th colspan="5"><li>Youth</li></th></tr>
                    <tr bgcolor="#dbdbdb"><td></td><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th></tr>
                    <tr><td></td><td>X-Small</td><td>25-26</td><td>22-24</td><td>25-27</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Small</td><td>26-28</td><td>24-25</td><td>27-29</td></tr>
                    <tr><td></td><td>Medium</td><td>28-30</td><td>25-26</td><td>29-31</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Large</td><td>30-32</td><td>26-27</td><td>31-33</td></tr>
                    <tr><td></td><td>X-Large</td><td>32-35</td><td>27-29</td><td>33-35</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th></th><th colspan="5"><li>Socks &nbsp; (by Shoe Sizes)</li></th></tr>
                    <tr bgcolor="#dbdbdb"><td></td><th>Size</th><th>Men</th><th>Women</th></tr>
                    <tr><td></td><td>X-Small</td><td>12T-2</td><td>1-4</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Small</td><td>1-4</td><td>3-6</td></tr>
                    <tr><td></td><td>Medium</td><td>5-8</td><td>7-10</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Large</td><td>9-12</td><td>11-14</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th></th><th colspan="4"><li>Shinguards</li></th></tr>
                    <tr bgcolor="#dbdbdb"><td></td><th>Size</th><th>Length</th></tr>
                    <tr><td></td><td>X-Small</td><td>9 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Small</td><td>10 in.</td></tr>
                    <tr><td></td><td>Medium</td><td>11 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>Large</td><td>12 in.</td></tr>
                    <tr><td></td><td>X-Large</td><td>13 in.</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th></th><th colspan="5"><li>Footwear (Shoes)</li></th></tr>
                    <tr bgcolor="#dbdbdb"><td></td><th>Women</th><th>Men</th><th>U.K.</th><th>Europe</th><th>cm</th></tr>
                    <tr><td></td><td>5</td><td>3.5</td><td>3</td><td>35.5</td><td>21</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>5.5</td><td>4</td><td>3.5</td><td>36</td><td>22</td></tr>
                    <tr><td></td><td>6</td><td>4.5</td><td>4</td><td>36.5</td><td>22.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>6.5</td><td>5</td><td>4.5</td><td>37</td><td>23</td></tr>
                    <tr><td></td><td>7</td><td>5.5</td><td>5</td><td>38</td><td>23.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>7.5</td><td>6</td><td>5.5</td><td>38.5</td><td>24</td></tr>
                    <tr><td></td><td>8</td><td>6.5</td><td>6</td><td>39</td><td>24.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>8.5</td><td>7</td><td>6.5</td><td>40</td><td>25</td></tr>
                    <tr><td></td><td>9</td><td>7.5</td><td>7</td><td>40.5</td><td>25.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>9.5</td><td>8</td><td>7.5</td><td>41</td><td>26</td></tr>
                    <tr><td></td><td>10</td><td>8.5</td><td>8</td><td>42</td><td>26.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>10.5</td><td>9</td><td>8.5</td><td>4.25</td><td>27</td></tr>
                    <tr><td></td><td>11</td><td>9.5</td><td>9</td><td>43</td><td>27.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>11.5</td><td>10</td><td>9.5</td><td>44</td><td>28</td></tr>
                    <tr><td></td><td>12</td><td>10.5</td><td>10</td><td>44.53</td><td>28.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td></td><td>11</td><td>10.5</td><td>45</td><td>29</td></tr>
                    <tr><td></td><td></td><td>11.5</td><td>11</td><td>45.5</td><td>29.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td></td><td>12</td><td>11.5</td><td>46</td><td>30</td></tr>
                    <tr><td></td><td></td><td>13</td><td>12.5</td><td>47</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td></td><td>14</td><td>13.5</td><td>48</td><td>32</td></tr>
                  </tbody></table>
                  <br><br>

                  <a name="Joma"><img src="images/BrandLogos/Logo_Joma.gif" align="middle"> &nbsp; <font class="arial12bold" style="color:blue;">Joma Sizes</font></a>
                  <br><br>

                            '
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr><td></td><th colspan="7"><li>Team Sets (Uniforms) - Adult</li></th></tr>
                    <tr bgcolor="#dbdbdb">
                      <td></td>
                      <th></th>
                      <td></td>
                      <th>S</th><th>M</th><th>L</th><th>XL</th><th>XXL</th>
                    </tr>
                    <tr>
                      <td></td><th>Jerseys</th>
                      <td>Chest</td>
                      <td>43</td><td>45</td><td>47</td><td>49</td><td>52</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Length</td>
                      <td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <th>Shorts</th>
                      <td>Waist</td>
                      <td>29-30</td><td>31-32</td><td>33-34</td><td>36-38</td><td>40-42</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td></td>
                      <td>Inseam</td>
                      <td>6.5</td><td>7</td><td>7.5</td><td>8.25</td><td>9</td>
                    </tr>
                    <tr>
                      <td></td>
                      <th>Fitted Jerseys</th>
                      <td>Chest</td>
                      <td>39</td><td>41</td><td>42</td><td>44</td><td>46</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Length</td>
                      <td>25</td><td>26</td><td>27</td><td>28</td><td>29</td>
                    </tr>
                    <tr height="10"><td colspan="8"></td></tr>

                    <tr><td></td><th colspan="7"><li>Team Sets (Uniforms) - Youth</li></th></tr>
                    <tr bgcolor="#dbdbdb">
                      <td></td>
                      <th></th>
                      <td></td>
                      <th>YXS</th><th>YS</th><th>YM</th><th>YL</th><th></th>
                    </tr>
                    <tr>
                      <td></td>
                      <th>Jerseys</th>
                      <td>Chest</td>
                      <td>34</td><td>36</td><td>38</td><td>40</td><td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Length</td>
                      <td>22</td><td>23</td><td>24</td><td>25</td><td></td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <th>Shorts</th>
                      <td>Waist</td>
                      <td>21-22</td><td>23-24</td><td>25-26</td><td>27-28</td><td></td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td></td>
                      <td>Inseam</td>
                      <td>4 1/3</td><td>5 1/3</td><td>5.5</td><td>5 3/4</td><td></td>
                    </tr>
                    <tr height="10"><td colspan="8"></td></tr>

                    <tr><td></td><th colspan="7"><li>Warm-Ups - Adult</li></th></tr>
                    <tr bgcolor="#dbdbdb">
                      <td></td>
                      <th></th>
                      <td></td>
                      <th>S</th><th>M</th><th>L</th><th>XL</th><th>XXL</th>
                    </tr>
                    <tr>
                      <td></td>
                      <th>Jackets</th>
                      <td>Chest</td>
                      <td>44</td><td>46</td><td>48</td><td>50</td><td>53</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Length</td>
                      <td>26</td><td>27</td><td>28</td><td>29</td><td>30</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Sleeve</td>
                      <td>28 1/3</td><td>30</td><td>31.5</td><td>33</td><td>34 2/3</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <th>Trousers/Pants</th>
                      <td>Waist</td>
                      <td>29-30</td><td>31-32</td><td>33-34</td><td>36-38</td><td>40-42</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td></td>
                      <td>Inseam</td>
                      <td>30</td><td>31</td><td>32</td><td>33</td><td>34</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td></td>
                      <td>Length</td>
                      <td>39.5</td><td>41</td><td>42.5</td><td>44</td><td>45.5</td>
                    </tr>
                    <tr height="10"><td colspan="8"></td></tr>

                    <tr><td></td><th colspan="7"><li>Warm-Ups - Youth</li></th></tr>
                    <tr bgcolor="#dbdbdb">
                      <td></td>
                      <th></th>
                      <td></td>
                      <th>YXS (8 Years)</th><th>YS (10 Years)</th><th>YM (12 Years)</th><th>YL (14 Years)</th><th></th>
                    </tr>
                    <tr>
                      <td></td>
                      <th>Jackets</th>
                      <td>Chest</td>
                      <td>35</td><td>37</td><td>39</td><td>41</td><td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Length</td>
                      <td>19 2/3</td><td>21 1/4</td><td>23</td><td>24 1/2</td><td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Sleeve</td>
                      <td>22</td><td>23.5</td><td>25 1/4</td><td>27</td><td></td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <th>Trouser/Pants</th>
                      <td>Waist</td>
                      <td>21-22</td><td>23-24</td><td>25-26</td><td>27-28</td><td></td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td></td>
                      <td>Inseam</td>
                      <td>21</td><td>23</td><td>25</td><td>27</td><td></td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td>
                      <td></td>
                      <td>Length</td>
                      <td>30 1/3</td><td>33</td><td>36</td><td>38</td><td></td>
                    </tr>
                    <tr height="10"><td colspan="8"></td></tr>

                    <tr><td></td><th colspan="7"><li>US Footwear Sizes</li></th></tr>
                    <tr bgcolor="#dbdbdb">
                      <td></td>
                      <th>Adlut</th>
                      <td></td>
                      <th colspan="5">6 &nbsp; 6.5 &nbsp; 7 &nbsp; 7.5 &nbsp; 8 &nbsp; 8.5 &nbsp; 9 &nbsp; 9.5 &nbsp; 10 &nbsp; 10.5 &nbsp; 11 &nbsp; 11.5 &nbsp; 12 &nbsp; 12.5</th>
                    </tr>
                    <tr height="1"><td colspan="8"></td></tr>
                    <tr bgcolor="#dbdbdb">
                      <td></td>
                      <th>Youth</th>
                      <td></td>
                      <th colspan="5">10 &nbsp; 10.5 &nbsp; 11 &nbsp; 11.5 &nbsp; 12 &nbsp; 13 &nbsp; 13.5 &nbsp; 1 &nbsp; 1.5 &nbsp; 2 &nbsp; 2.5 &nbsp; 3 &nbsp; 3.5 &nbsp; 4 &nbsp; 4.5 &nbsp; 5 &nbsp; 5.5</th>
                    </tr>
                  </tbody></table>
                  <br><br>

                  <a name="Kelme"><img src="images/BrandLogos/Logo_Kelme.gif" align="middle"> <font class="arial12bold" style="color:blue;">Kelme Sizes</font></a>
                  <br><br>

                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr><th colspan="5"><li>Men</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td>Small</td><td>35-38</td><td>29-31</td><td>35-38</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>38-41</td><td>31-34</td><td>38-40</td><td>32</td></tr>
                    <tr><td>Large</td><td>41-44</td><td>34-37</td><td>41-43</td><td>33</td></tr>
                    <tr bgcolor="#F0F0F0"><td>X-Large</td><td>44-47</td><td>37-41</td><td>43-46</td><td>34</td></tr>
                    <tr><td>2X-Large</td><td>47-50</td><td>41-44</td><td>46-49</td><td>35</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Women</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td>X-Small</td><td>31-33</td><td>23-25</td><td>33-35</td><td>30</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>33-36</td><td>25-28</td><td>35-38</td><td>30.5</td></tr>
                    <tr><td>Medium</td><td>36-39</td><td>28-31</td><td>38-41</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>39-42</td><td>31-34</td><td>41-44</td><td>31.5</td></tr>
                    <tr><td>X-Large</td><td>42-45</td><td>34-37</td><td>44-47</td><td>32</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Youth</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th></tr>
                    <tr><td>X-Small</td><td>25-26</td><td>22-24</td><td>25-27</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>26-28</td><td>24-25</td><td>27-29</td></tr>
                    <tr><td>Medium</td><td>28-30</td><td>25-26</td><td>29-31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>30-32</td><td>26-27</td><td>31-33</td></tr>
                    <tr><td>X-Large</td><td>32-35</td><td>27-29</td><td>33-35</td></tr><tr>
                    </tr><tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Socks &nbsp; (by Shoe Sizes)</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Men</th><th>Women</th></tr>
                    <tr><td>X-Small</td><td>12T-2</td><td>1-4</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>1-4</td><td>3-6</td></tr>
                    <tr><td>Medium</td><td>5-8</td><td>7-10</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>9-12</td><td>11-14</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Shinguards</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Length</th></tr>
                    <tr><td>X-Small</td><td>9 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>10 in.</td></tr>
                    <tr><td>Medium</td><td>11 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>12 in.</td></tr>
                    <tr><td>X-Large</td><td>13 in.</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="7"><li>Footwear (Shoes)</li></th></tr>
                    <tr bgcolor="#dbdbdb">
                      <th colspan="2" align="center">U.S.</th>
                      <th colspan="2" align="center">U.K.</th>
                      <th colspan="2" align="center">Europe</th>
                      <th>cm</th>
                    </tr>
                    <tr bgcolor="#dbdbdb">
                      <th>Women</th><th>Men</th>
                      <th>Women</th><th>Men</th>
                      <th>Women</th><th>Men</th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>5</td><td></td>
                      <td>2.5</td><td></td>
                      <td>35.5</td><td></td>
                      <td>22</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>5.5</td><td></td>
                      <td>3</td><td></td>
                      <td>36</td><td></td>
                      <td>22.5</td>
                    </tr>
                    <tr>
                      <td>6</td><td></td>
                      <td>3.5</td><td></td>
                      <td>36.5</td><td></td>
                      <td>23</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>6.5</td><td></td>
                      <td>4</td><td></td>
                      <td>37.5</td><td></td>
                      <td>23.5</td>
                    </tr>
                    <tr>
                      <td>7</td><td>6</td>
                      <td>4.5</td><td>5</td>
                      <td>38</td><td>39</td>
                      <td>24</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>7.5</td><td>6.5</td>
                      <td>5</td><td>5.5</td>
                      <td>38.5</td><td>39.5</td>
                      <td>24.5</td>
                    </tr>
                    <tr>
                      <td>8</td><td>7</td>
                      <td>5.5</td><td>6</td>
                      <td>39</td><td>40</td>
                      <td>25</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>8.5</td><td>7.5</td>
                      <td>6</td><td>6.5</td>
                      <td>40</td><td>40.5</td>
                      <td>25.5</td>
                    </tr>
                    <tr>
                      <td>9</td><td>8</td>
                      <td>6.5</td><td>7</td>
                      <td>40.5</td><td>41</td>
                      <td>26</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>9.5</td><td>8.5</td>
                      <td>7</td><td>7.5</td>
                      <td>41</td><td>42</td>
                      <td>26.5</td>
                    </tr>
                    <tr>
                      <td>10</td><td>9</td>
                      <td>7.5</td><td>8</td>
                      <td>42</td><td>42.5</td>
                      <td>27</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>10.5</td><td>9.5</td>
                      <td>8</td><td>8.5</td>
                      <td>42.5</td><td>43</td>
                      <td>27.5</td>
                    </tr>
                    <tr>
                      <td>11</td><td>10</td>
                      <td>8.5</td><td>9</td>
                      <td>43</td><td>44</td>
                      <td>28</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>10.5</td>
                      <td></td><td>9.5</td>
                      <td></td><td>44.5</td>
                      <td>28.5</td>
                    </tr>
                    <tr>
                      <td></td><td>11</td>
                      <td></td><td>10</td>
                      <td></td><td>45</td>
                      <td>29</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>11.5</td>
                      <td></td><td>10.5</td>
                      <td></td><td>45.5</td>
                      <td>29.5</td>
                    </tr>
                    <tr>
                      <td></td><td>12</td>
                      <td></td><td>11</td>
                      <td></td><td>46</td>
                      <td>30</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>12.5</td>
                      <td></td><td>11.5</td>
                      <td></td><td>47</td>
                      <td>30.5</td>
                    </tr>
                    <tr>
                      <td></td><td>13</td>
                      <td></td><td>12</td>
                      <td></td><td>47.5</td>
                      <td>31</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>13.5</td>
                      <td></td><td>12.5</td>
                      <td></td><td>48</td>
                      <td>31.5</td>
                    </tr>
                    <tr>
                      <td></td><td>14</td>
                      <td></td><td>13</td>
                      <td></td><td>48.5</td>
                      <td>32</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>15</td>
                      <td></td><td>14</td>
                      <td></td><td>49.5</td>
                      <td>33</td>
                    </tr>
                  </tbody></table>
                  <br><br>

                  <a name="Nike"><img src="images/BrandLogos/Logo_Nike.gif" align="middle"> <font class="arial12bold" style="color:blue;">Nike Sizes</font></a>
                  <br><br>

                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr><th colspan="5"><li>Men</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td>Small</td><td>35-38</td><td>29-31</td><td>35-38</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>38-41</td><td>31-34</td><td>38-40</td><td>32</td></tr>
                    <tr><td>Large</td><td>41-44</td><td>34-37</td><td>41-43</td><td>33</td></tr>
                    <tr bgcolor="#F0F0F0"><td>X-Large</td><td>44-47</td><td>37-41</td><td>43-46</td><td>34</td></tr>
                    <tr><td>2X-Large</td><td>47-50</td><td>41-44</td><td>46-49</td><td>35</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Women</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td>X-Small</td><td>31-33</td><td>23-25</td><td>33-35</td><td>30</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>33-36</td><td>25-28</td><td>35-38</td><td>30.5</td></tr>
                    <tr><td>Medium</td><td>36-39</td><td>28-31</td><td>38-41</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>39-42</td><td>31-34</td><td>41-44</td><td>31.5</td></tr>
                    <tr><td>X-Large</td><td>42-45</td><td>34-37</td><td>44-47</td><td>32</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Youth</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th></tr>
                    <tr><td>X-Small</td><td>25-26</td><td>22-24</td><td>25-27</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>26-28</td><td>24-25</td><td>27-29</td></tr>
                    <tr><td>Medium</td><td>28-30</td><td>25-26</td><td>29-31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>30-32</td><td>26-27</td><td>31-33</td></tr>
                    <tr><td>X-Large</td><td>32-35</td><td>27-29</td><td>33-35</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Little Kids</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Height</th><th>Weight</th></tr>
                    <tr><td>Small</td><td>39-42</td><td>36-41</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>42-45</td><td>41-46</td></tr>
                    <tr><td>Large</td><td>46-49</td><td>47-51</td></tr>
                    <tr bgcolor="#F0F0F0"><td>X-Large</td><td>49-50</td><td>52-55</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Toddlers</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Height</th><th>Weight</th></tr>
                    <tr><td>Small</td><td>33-35</td><td>29-31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>36-38</td><td>32-36</td></tr>
                    <tr><td>Large</td><td>39-41</td><td>37-40</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Socks &nbsp; (by Shoe Sizes)</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Men</th><th>Women</th></tr>
                    <tr><td>X-Small</td><td>12T-2</td><td>1-4</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>1-4</td><td>3-6</td></tr>
                    <tr><td>Medium</td><td>5-8</td><td>7-10</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>9-12</td><td>11-14</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Shinguards</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Length</th></tr>
                    <tr><td>XX-Small</td><td>8 in.</td></tr>
                    <tr><td>X-Small</td><td>9 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>10 in.</td></tr>
                    <tr><td>Medium</td><td>11 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>12 in.</td></tr>
                    <tr><td>X-Large</td><td>13 in.</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="7"><li>Footwear (Shoes)</li></th></tr>
                    <tr bgcolor="#dbdbdb">
                      <th colspan="2" align="center">U.S.</th>
                      <th colspan="2" align="center">U.K.</th>
                      <th colspan="2" align="center">Europe</th>
                      <th>cm</th>
                    </tr>
                    <tr bgcolor="#dbdbdb">
                      <th>Women</th><th>Men</th>
                      <th>Women </th><th>Men</th>
                      <th>Women </th><th>Men </th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>5</td><td></td>
                      <td>2.5</td><td></td>
                      <td>35.5</td><td></td>
                      <td>22</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>5.5</td><td></td>
                      <td>3</td><td></td>
                      <td>36</td><td></td>
                      <td>22.5</td>
                    </tr>
                    <tr>
                      <td>6</td><td></td>
                      <td>3.5</td><td></td>
                      <td>36.5</td><td></td>
                      <td>23</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>6.5</td><td></td>
                      <td>4</td><td></td>
                      <td>37.5</td><td></td>
                      <td>23.5</td>
                    </tr>
                    <tr>
                      <td>7</td><td>6</td>
                      <td>4.5</td><td>5</td>
                      <td>38</td><td>39</td>
                      <td>24</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>7.5</td><td>6.5</td>
                      <td>5</td><td>5.5</td>
                      <td>38.5</td><td>39.5</td>
                      <td>24.5</td>
                    </tr>
                    <tr>
                      <td>8</td><td>7</td>
                      <td>5.5</td><td>6</td>
                      <td>39</td><td>40</td>
                      <td>25</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>8.5</td><td>7.5</td>
                      <td>6</td><td>6.5</td>
                      <td>40</td><td>40.5</td>
                      <td>25.5</td>
                    </tr>
                    <tr>
                      <td>9</td><td>8</td>
                      <td>6.5</td><td>7</td>
                      <td>40.5</td><td>41</td>
                      <td>26</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>9.5</td><td>8.5</td>
                      <td>7</td><td>7.5</td>
                      <td>41</td><td>42</td>
                      <td>26.5</td>
                    </tr>
                    <tr>
                      <td>10</td><td>9</td>
                      <td>7.5</td><td>8</td>
                      <td>42</td><td>42.5</td>
                      <td>27</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>10.5</td><td>9.5</td>
                      <td>8</td><td>8.5</td>
                      <td>42.5</td><td>43</td>
                      <td>27.5</td>
                    </tr>
                    <tr>
                      <td>11</td><td>10</td>
                      <td>8.5</td><td>9</td>
                      <td>43</td><td>44</td>
                      <td>28</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>10.5</td>
                      <td></td><td>9.5</td>
                      <td></td><td>44.5</td>
                      <td>28.5</td>
                    </tr>
                    <tr>
                      <td></td><td>11</td>
                      <td></td><td>10</td>
                      <td></td><td>45</td>
                      <td>29</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>11.5</td>
                      <td></td><td>10.5</td>
                      <td></td><td>45.5</td>
                      <td>29.5</td>
                    </tr>
                    <tr>
                      <td></td><td>12</td>
                      <td></td><td>11</td>
                      <td></td><td>46</td>
                      <td>30</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>12.5</td>
                      <td></td><td>11.5</td>
                      <td></td><td>47</td>
                      <td>30.5</td>
                    </tr>
                    <tr>
                      <td></td><td>13</td>
                      <td></td><td>12</td>
                      <td></td><td>47.5</td>
                      <td>31</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>13.5</td>
                      <td></td><td>12.5</td>
                     <td></td><td>48</td>
                     <td>31.5</td>
                    </tr>
                    <tr>
                      <td></td><td>14</td>
                      <td></td><td>13</td>
                      <td></td><td>48.5</td>
                      <td>32</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>15</td>
                      <td></td><td>14</td>
                      <td></td><td>49.5</td>
                      <td>33</td>
                    </tr>
                  </tbody></table>
                  <br><br>

                  <a name="Puma"><img src="images/BrandLogos/Logo_Puma.gif" align="middle"> <font class="arial12bold" style="color:blue;">Puma Sizes</font></a>
                  <br><br>

                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr><th colspan="5"><li>Men</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td>Small</td><td>35-37</td><td>29-31</td><td>36-38</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>38-40</td><td>32-34</td><td>39-41</td><td>32</td></tr>
                    <tr><td>Large</td><td>41-44</td><td>35-38</td><td>41-44</td><td>33</td></tr>
                    <tr bgcolor="#F0F0F0"><td>X-Large</td><td>45-48</td><td>39-41</td><td>45-49</td><td>34</td></tr>
                    <tr><td>2X-Large</td><td>49-55</td><td>42-45</td><td>50-54</td><td>35</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Women</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td>X-Small</td><td>30-32</td><td>21-23</td><td>31-33</td><td>30</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>33-34</td><td>24-25</td><td>34-35</td><td>30.5</td></tr>
                    <tr><td>Medium</td><td>35-37</td><td>26-28</td><td>36-38</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>38-40</td><td>29-31</td><td>39-41</td><td>31.5</td></tr>
                    <tr><td>X-Large</td><td>42-45</td><td>32-34</td><td>42-45</td><td>32</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Youth</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th></tr>
                    <tr><td>X-Small</td><td>25-26</td><td>22-24</td><td>25-27</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>26-28</td><td>24-25</td><td>27-29</td></tr>
                    <tr><td>Medium</td><td>28-30</td><td>25-26</td><td>29-31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>30-32</td><td>26-27</td><td>31-33</td></tr>
                    <tr><td>X-Large</td><td>32-35</td><td>27-29</td><td>33-35</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Socks &nbsp; (by Shoe Sizes)</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Men</th><th>Women</th></tr>
                    <tr><td>X-Small</td><td>12T-2</td><td>1-4</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>1-4</td><td>3-6</td></tr>
                    <tr><td>Medium</td><td>5-8</td><td>7-10</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>9-12</td><td>11-14</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Shinguards</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Length</th></tr>
                    <tr><td>X-Small</td><td>9 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>10 in.</td></tr>
                    <tr><td>Medium</td><td>11 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>12 in.</td></tr>
                    <tr><td>X-Large</td><td>13 in.</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="7"><li>Footwear (Shoes)</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Women</th><th>Men</th><th>U.K. </th><th>Europe</th><th>Japan</th></tr>
                    <tr><td>5</td><td>3.5</td><td>2.5</td><td>35</td><td>21.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td>5.5</td><td>4</td><td>3</td><td>35.5</td><td>22</td></tr>
                    <tr><td>6</td><td>4.5</td><td>3.5</td><td>36</td><td>22.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td>6.5</td><td>5</td><td>4</td><td>37</td><td>23</td></tr>
                    <tr><td>7</td><td>5.5</td><td>4.5</td><td>37.5</td><td>23.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td>7.5</td><td>6</td><td>5</td><td>38</td><td>24</td></tr>
                    <tr><td>8</td><td>6.5</td><td>5.5</td><td>38.5</td><td>24.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td>8.5</td><td>7</td><td>6</td><td>39</td><td>25</td></tr>
                    <tr><td>9</td><td>7.5</td><td>6.5</td><td>40</td><td>25.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td>9.5</td><td>8</td><td>7</td><td>40.5</td><td>26</td></tr>
                    <tr><td>10</td><td>8.5</td><td>7.5</td><td>41</td><td>26.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td>10.5</td><td>9</td><td>8</td><td>42</td><td>27</td></tr>
                    <tr><td>11</td><td>9.5</td><td>8.5</td><td>42.5</td><td>27.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>10</td><td>9</td><td>43.5</td><td>28</td></tr>
                    <tr><td></td><td>10.5</td><td>9.5</td><td>44</td><td>28.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>11</td><td>10</td><td>44.5</td><td>29</td></tr>
                    <tr><td></td><td>11.5</td><td>10.5</td><td>45</td><td>29.5</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>12</td><td>11</td><td>46</td><td>30</td></tr>
                    <tr><td></td><td>13</td><td>12</td><td>47</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td></td><td>14</td><td>13</td><td>48</td><td>31.5</td></tr>
                  </tbody></table>
                  <br><br>

                  <a name="Reebok"><img src="images/BrandLogos/Logo_Reebok.gif" align="middle"> <font class="arial12bold" style="color:blue;">Reebok Sizes</font></a>
                  <br><br>

                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr><th colspan="5"><li>Men</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td>Small</td><td>35-37</td><td>29-31</td><td>36-38</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>38-40</td><td>32-34</td><td>39-41</td><td>32</td></tr>
                    <tr><td>Large</td><td>41-44</td><td>35-38</td><td>41-44</td><td>33</td></tr>
                    <tr bgcolor="#F0F0F0"><td>X-Large</td><td>45-48</td><td>39-41</td><td>45-49</td><td>34</td></tr>
                    <tr><td>2X-Large</td><td>49-55</td><td>42-45</td><td>50-54</td><td>35</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Women</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th><th>Inseam</th></tr>
                    <tr><td>X-Small</td><td>30-32</td><td>21-23</td><td>31-33</td><td>30</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>33-34</td><td>24-25</td><td>34-35</td><td>30.5</td></tr>
                    <tr><td>Medium</td><td>35-37</td><td>26-28</td><td>36-38</td><td>31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>38-40</td><td>29-31</td><td>39-41</td><td>31.5</td></tr>
                    <tr><td>X-Large</td><td>42-45</td><td>32-34</td><td>42-45</td><td>32</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Youth</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th></tr>
                    <tr><td>X-Small</td><td>25-26</td><td>22-24</td><td>25-27</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>26-28</td><td>24-25</td><td>27-29</td></tr>
                    <tr><td>Medium</td><td>28-30</td><td>25-26</td><td>29-31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>30-32</td><td>26-27</td><td>31-33</td></tr>
                    <tr><td>X-Large</td><td>32-35</td><td>27-29</td><td>33-35</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Socks &nbsp; (by Shoe Sizes)</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Men</th><th>Women</th></tr>
                    <tr><td>X-Small</td><td>12T-2</td><td>1-4</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>1-4</td><td>3-6</td></tr>
                    <tr><td>Medium</td><td>5-8</td><td>7-10</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>9-12</td><td>11-14</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5"><li>Shinguards</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Length</th></tr>
                    <tr><td>X-Small</td><td>9 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>10 in.</td></tr>
                    <tr><td>Medium</td><td>11 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>12 in.</td></tr>
                    <tr><td>X-Large</td><td>13 in.</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="7"><li>Footwear (Shoes)</li></th></tr>
                    <tr bgcolor="#dbdbdb">
                      <th colspan="2" align="center">U.S.</th>
                      <th colspan="2" align="center">U.K.</th>
                      <th colspan="2" align="center">Europe</th>
                      <th>cm</th>
                    </tr>
                    <tr bgcolor="#dbdbdb">
                      <th>Women</th><th>Men</th>
                      <th>Women </th><th>Men</th>
                      <th>Women </th><th>Men </th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>5</td><td></td>
                      <td>2.5</td><td></td>
                      <td>35</td><td></td>
                      <td>22</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>5.5</td><td></td>
                      <td>3</td><td></td>
                      <td>35.5</td><td></td>
                      <td>22.5</td>
                    </tr>
                    <tr>
                      <td>6</td><td></td>
                      <td>3.5</td><td></td>
                      <td>36</td><td></td>
                      <td>23</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>6.5</td><td></td>
                      <td>4</td><td></td>
                      <td>37</td><td></td>
                      <td>23.5</td>
                    </tr>
                    <tr>
                      <td>7</td><td></td>
                      <td>4.5</td><td></td>
                      <td>37.5</td><td></td>
                      <td>24</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>7.5</td><td>6.5</td>
                      <td>5</td><td>5.5</td>
                      <td>38</td><td>38.5</td>
                      <td>24.5</td>
                    </tr>
                    <tr>
                      <td>8</td><td>7</td>
                      <td>5.5</td><td>6</td>
                      <td>38.5</td><td>39</td>
                      <td>25</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>8.5</td><td>7.5</td>
                      <td>6</td><td>6.5</td>
                      <td>39</td><td>40</td>
                      <td>25.5</td>
                    </tr>
                    <tr>
                      <td>9</td><td>8</td>
                      <td>6.5</td><td>7</td>
                      <td>40</td><td>40.5</td>
                      <td>26</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>9.5</td><td>8.5</td>
                      <td>7</td><td>7.5</td>
                      <td>40.5</td><td>41</td>
                      <td>26.5</td>
                    </tr>
                    <tr>
                      <td>10</td><td>9</td>
                      <td>7.5</td><td>8</td>
                      <td>41</td><td>42</td>
                      <td>27</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td>10.5</td><td>9.5</td>
                      <td>8</td><td>8.5</td>
                      <td>42</td><td>42.5</td>
                      <td>27.5</td>
                    </tr>
                    <tr>
                      <td>11</td><td>10</td>
                      <td>8.5</td><td>9</td>
                      <td>42.5</td><td>43</td>
                      <td>28</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>10.5</td>
                      <td></td><td>9.5</td>
                      <td></td><td>44</td>
                      <td>28.5</td>
                    </tr>
                    <tr>
                      <td></td><td>11</td>
                      <td></td><td>10</td>
                      <td></td><td>44.5</td>
                      <td>29</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>11.5</td>
                      <td></td><td>10.5</td>
                      <td></td><td>45</td>
                      <td>29.5</td>
                    </tr>
                    <tr>
                      <td></td><td>12</td>
                      <td></td><td>11</td>
                      <td></td><td>45.5</td>
                      <td>30</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>12.5</td>
                      <td></td><td>11.5</td>
                      <td></td><td>46</td>
                      <td>30.5</td>
                    </tr>
                    <tr>
                      <td></td><td>13</td>
                      <td></td><td>12</td>
                      <td></td><td>47</td>
                      <td>31</td>
                    </tr>
                    <tr bgcolor="#F0F0F0">
                      <td></td><td>14</td>
                      <td></td><td>13</td>
                      <td></td><td>48.5</td>
                      <td>32</td>
                    </tr>
                    <tr>
                      <td></td><td>15</td>
                      <td></td><td>14</td>
                      <td></td><td>50</td>
                      <td>33</td>
                    </tr>
                  </tbody></table>
                  <br><br>

                  <a name="Rhinox"><img src="images/BrandLogos/Logo_Rhinox.gif" align="middle"> &nbsp; <font class="arial12bold" style="color:blue;">Rhinox Sizes</font></a>
                  <br><br>

                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr><td></td><th colspan="7"><li>Adult Men</li></th></tr>
                    <tr bgcolor="#dbdbdb">
                      <td></td>
                      <th></th>
                      <td></td>
                      <th>S</th><th>M</th><th>L</th><th>XL</th><th>XXL</th>
                    </tr>
                    <tr>
                      <td></td>
                      <th>Jerseys / Shirts</th>
                      <td>Chest</td>
                      <td>21 3/4</td><td>22 3/4</td><td>23 3/4</td><td>24 3/4</td><td>25 3/4</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Length</td>
                      <td>27 3/4</td><td>28 2/4</td><td>29 1/4</td><td>30</td><td>31</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Sleeve Length</td>
                      <td>9</td><td>9 2/4</td><td>9 3/4</td><td>10 1/4</td><td>10 3/4</td>
                    </tr>
                    <tr height="10"><td colspan="8"></td></tr>
                    <tr><td></td><th colspan="7"><li>Youth Boys</li></th></tr>
                    <tr bgcolor="#dbdbdb">
                      <td></td>
                      <th></th>
                      <td></td>
                      <th>S</th><th>M</th><th>L</th><th>XL</th><th></th>
                    </tr>
                    <tr>
                      <td></td>
                      <th>Jerseys / Shirts</th>
                      <td>Chest</td>
                      <td>16 3/4</td><td>17 3/4</td><td>18 3/4</td><td>19 3/4</td><td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Length</td>
                      <td>23 1/4</td><td>24</td><td>24 3/4</td><td>25 2/4</td><td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Sleeve Length</td>
                      <td>7 1/4</td><td>7 2/4</td><td>8</td><td>8 1/4</td><td></td>
                    </tr>
                    <tr height="10"><td colspan="8"></td></tr>
                  </tbody></table>
                  <br><br>

                  <a name="Umbro"><img src="images/BrandLogos/Logo_Umbro.gif" align="middle"> <font class="arial12bold" style="color:blue;">Umbro Sizes</font></a>
                  <br><br>

                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr><th colspan="5" valign="bottom"><li>Men</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th></tr>
                    <tr><td>Small</td><td>34-36</td><td>26-28</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>38-40</td><td>30-32</td></tr>
                    <tr><td>Large</td><td>42-44</td><td>34-36</td></tr>
                    <tr bgcolor="#F0F0F0"><td>X-Large</td><td>46-48</td><td>38-40</td></tr>
                    <tr><td>2X-Large</td><td>50-52</td><td>42-44</td></tr>
                    <tr><td>3X-Large</td><td>54-56</td><td>46-48</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5" valign="bottom"><li>Women</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th><th>Hip</th></tr>
                    <tr><td>X-Small</td><td>32-34</td><td>24-26</td><td>34-36</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>34-36</td><td>26-28</td><td>36-38</td></tr>
                    <tr><td>Medium</td><td>36-38</td><td>28-30</td><td>38-40</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>38-40</td><td>30-32</td><td>40-42</td></tr>
                    <tr><td>X-Large</td><td>40-43</td><td>32-35</td><td>42-45</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5" valign="bottom"><li>Youth</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Chest</th><th>Waist</th></tr>
                    <tr><td>Small</td><td>26-28</td><td>22-24</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>28-30</td><td>24-26</td></tr>
                    <tr><td>Large</td><td>30-32</td><td>26-28</td></tr>
                    <tr bgcolor="#F0F0F0"><td>X-Large</td><td>32-34</td><td>28-30</td></tr>
                    <tr><td>2X-Large</td><td>50-52</td><td>42-44</td></tr>
                    <tr><td>3X-Large</td><td>54-56</td><td>46-48</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5" valign="bottom"><li>Little Kids</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Height</th><th>Weight</th></tr>
                    <tr><td>Small</td><td>39-42</td><td>36-41</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>42-45</td><td>41-46</td></tr>
                    <tr><td>Large</td><td>46-49</td><td>47-51</td></tr>
                    <tr bgcolor="#F0F0F0"><td>X-Large</td><td>49-50</td><td>52-55</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5" valign="bottom"><li>Toddlers</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Height</th><th>Weight</th></tr>
                    <tr><td>Small</td><td>33-35</td><td>29-31</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Medium</td><td>36-38</td><td>32-36</td></tr>
                    <tr><td>Large</td><td>39-41</td><td>37-40</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>
                    <tr><th colspan="5" valign="bottom"><li>Socks &nbsp; (by Shoe Sizes)</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Men</th><th>Women</th></tr>
                    <tr><td>X-Small</td><td>12T-2</td><td>1-4</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>2-5</td><td>4-7</td></tr>
                    <tr><td>Medium</td><td>5-9</td><td>7-10</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>9 +</td><td>10 +</td></tr>
                    <tr height="10"><td colspan="5"></td></tr>

                    <tr><th colspan="5" valign="bottom"><li>Shinguards</li></th></tr>
                    <tr bgcolor="#dbdbdb"><th>Size</th><th>Length</th></tr>
                    <tr><td>X-Small</td><td>9 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Small</td><td>10 in.</td></tr>
                    <tr><td>Medium</td><td>11 in.</td></tr>
                    <tr bgcolor="#F0F0F0"><td>Large</td><td>12 in.</td></tr>
                    <tr><td>X-Large</td><td>13 in.</td></tr>
                  </tbody></table>

                </td>
              </tr>
            </tbody></table>
          </td>
        </tr>
        <tr height="20"><td></td></tr>
      </tbody></table>
    </td>
-->