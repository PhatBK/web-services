@extends('layout.index')
@section('content')
<!-- Page Content -->
<div class="container">
	<!-- slider -->
	@include('layout.slide')
	<!-- end slide -->
	<div class="space20"></div>
	<div class="row main-left">
		@include('layout.menu')
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:#337AB7; color:white;" >
					<h2 style="margin-top:0px; margin-bottom:0px;">Giới thiệu</h2>
				</div>
				<div class="panel-body">
					<!-- item -->
					<p>
						Chào mừng các bạn đã đến với Trường Đại học Bách khoa Hà Nội – Trường đại học kỹ thuật đầu tiên của đất nước.
						Với 60 năm hình thành và phát triển, tên tuổi của Trường ĐHBK Hà Nội luôn gắn liền với những sự kiện trọng đại của đất nước. Trong thời chiến, lớp lớp thầy và trò ĐHBK Hà Nội đã có mặt trên mọi chiến trường, đóng góp không nhỏ công sức và xương máu của mình cho công cuộc đấu tranh giải phóng dân tộc, thống nhất đất nước. Trong thời bình, thầy và trò ĐHBK Hà Nội tiếp tục có những thành tích đóng góp cho công cuộc xây dựng, phát triển đất nước trong thời kỳ CNH, HĐH và hội nhập quốc tế. Ghi nhận những đóng góp đó, Đảng và Nhà nước ta đã trao tặng nhiều danh hiệu, phần thưởng cao quý như Anh hùng Lao động, Anh hùng Lực lượng vũ trang nhân dân, Huân chương Hồ Chí Minh...

						Tự hào với truyền thống vẻ vang, với tinh thần đoàn kết của toàn thể CBVC và sinh viên, với sự quan tâm và hỗ trợ to lớn của Đảng và Nhà nước, của bạn bè trong nước và quốc tế, chúng ta chắc chắn sẽ hoàn thành thắng lợi mục tiêu đề ra: “Xây dựng Trường Đại học Bách khoa Hà Nội thành trường đại học đào tạo trình độ cao, đa ngành, đa lĩnh vực; một trung tâm nghiên cứu khoa học công nghệ hàng đầu của đất nước, với một số lĩnh vực đạt trình độ tiên tiến trong khu vực và trên thế giới; một địa chỉ tin cậy, hấp dẫn đối với các nhà đầu tư phát triển công nghệ, giới doanh nghiệp trong và ngoài nước”.

						Thế hệ Bách khoa hôm nay sẽ kiên định với mục tiêu, sẵn sàng với thử thách, tiên phong trong đổi mới giáo dục, đào tạo, nghiên cứu khoa học và chuyển giao công nghệ, tăng cường hợp tác đào tạo và nghiên cứu khoa học với các trường đại học, viện nghiên cứu trên thế giới, xây dựng các chương trình nghiên cứu mang tính quốc tế, viết tiếp những trang vàng vào lịch sử truyền thống của Trường.
					</p>
					<hr>
					<h3><p align="center" style="color: #ffbf00;">Team Development</p></h3>
					<img src="team.jpg" width="800px">
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- end Page Content -->
@endsection