
@extends('layout.master')
@section('content')    
    <style type=text/css>
 .post_single{padding-top:30px}.post_single_detail{border-bottom:1px solid var(--color_border)}.post_single__name{margin-bottom:20px}.post_single__name h1{font-size:50px}.post_single__date{align-items:center;margin-bottom:15px}.post_single__date .author-name{margin-right:20px}
</style>
                <main class="main">
                        <div class="breadcrumb w-100">
                        <div class="container">	
                                <ul itemscope itemtype="https://schema.org/BreadcrumbList">
                                                                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                                                                                                <a itemprop="item" href="https://mbmart.com.vn" style="display: inline;">
                                                                                                                <span itemprop="name">
                                                                                                                                                Trang chủ
                                                                                                                                </span>
                                                                <meta itemprop="position" content="1" >
                                                                                                                </a>
                                                                                                </li>
                                                                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                                                                                                <span itemprop="name">
                                                                                                                                                Liên hệ với siêu thị Mẹ và Bé MBMart
                                                                                                                                </span>
                                                                <meta itemprop="position" content="2" >
                                                                                                </li>
                                                                </ul>
                        </div>
                </div>				
        <div class=" post_single  w-100">
        <div class="container">
                                        <div class="post_single__name w-100">
                        <h1 class="color_title">Liên hệ với siêu thị Mẹ và Bé MBMart</h1>
                        </div>
                                <div class="ck ck-reset ck-editor ck-rounded-corners w-100" role="application" dir="ltr">
                        <div class="ck-content w-100" id="single-content" data-title="Mục lục">
                        <div class="contact-content__map"><iframe style="border-width:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9270058033526!2d105.76521037411808!3d21.03560648754563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345497958751df%3A0x9082e32e3c3709e6!2sSi%C3%AAu%20th%E1%BB%8B%20MB%20Mart%20-%20MBMart.com.vn!5e0!3m2!1sen!2s!4v1694489847078!5m2!1sen!2s" width=600 height=450 allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div><div class="contact-content flex"><div class="contact-content__form"><div class="ck ck-reset ck-editor ck-rounded-corners" role="application" dir="ltr"><div class="ck-content"><p>Để đảm bảo việc liên lạc và giao tiếp dễ dàng hơn, chúng tôi rất mong được nghe từ bạn. Xin vui lòng sử dụng thông tin liên lạc dưới đây để gửi câu hỏi, ý kiến phản hồi hoặc yêu cầu của bạn. Chúng tôi luôn sẵn lòng hỗ trợ và trả lời mọi thắc mắc của bạn.</p><section class="short_code form-custom text-center web "
                        style=""
        >
                        <div class="form-group__able  flex-5">
                                                        <div class="form-custom form-data w-100 " style="width: 100%;">
                                                        <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="form-custom__wrap w-100">
                <p class="title text-center">Liên hệ</p>

                <div class="content-row">
                <div class="content-item">
                        <label for="name_9">Họ và Tên *</label>
                        <input type="text" class="form-control field" name="name" id="name_9" placeholder="Họ và Tên" data-validate="text" data-limit="120">
                        @error('name') <p class="err_show">{{ $message }}</p> @enderror
                </div>
                </div>

                <div class="content-row">
                <div class="content-item">
                        <label for="name_6">Địa chỉ Email *</label>
                        <input type="text" class="form-control field" name="email" id="name_6" placeholder="Địa chỉ Email" data-validate="email" data-limit="">
                        @error('email') <p class="err_show">{{ $message }}</p> @enderror
                </div>
                <div class="content-item">
                        <label for="name_4">Điện thoại *</label>
                        <input type="text" class="form-control field" name="phone" id="name_4" placeholder="Điện thoại" data-validate="phone">
                        @error('phone') <p class="err_show">{{ $message }}</p> @enderror
                </div>
                </div>

                <div class="content-item">
                <label for="name_7">Nội dung *</label>
                <textarea name="message" data-limit="500" class="form-control field" placeholder="Nội dung" data-validate="textarea"></textarea>
                @error('message') <p class="err_show">{{ $message }}</p> @enderror
                </div>

                <div class="content-item submit">
                <button class="content-item__submit" type="submit">Gửi liên hệ</button>
                </div>
        </div>
        </form>

                        </div>   
                </div>
                </section>
        <p><strong>Giờ làm việc:</strong><br>Thứ Hai đến Thứ Sáu: từ 8:00 sáng đến 5:00 chiều (giờ địa phương).</p><p>Ngoài ra, bạn cũng có thể sử dụng mẫu liên hệ dưới đây để gửi tin nhắn trực tiếp cho chúng tôi. Chúng tôi cam kết sẽ phản hồi trong thời gian sớm nhất có thể.</p><p><strong>Mẫu liên hệ:</strong><br><strong>Tên của bạn: </strong>[Điền tên của bạn]</p><p><strong>Email của bạn</strong>: [Điền địa chỉ email của bạn]</p><p><strong>Tiêu đề</strong>: [Chủ đề của tin nhắn]</p><p><strong>Nội dung</strong>: [Xin vui lòng nhập nội dung tin nhắn của bạn ở đây]</p><p>Chân thành cảm ơn sự quan tâm và hợp tác của bạn. Chúng tôi sẽ cố gắng hết sức để giải quyết mọi vấn đề và hỗ trợ bạn trong thời gian sớm nhất.</p><section class="partner short_code short-product "
                                       
                >
                        </main>      
 @endsection 
                               
                     
                
