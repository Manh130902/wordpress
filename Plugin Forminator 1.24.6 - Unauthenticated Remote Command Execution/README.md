Plugin Forminator 1.24.6 - Unauthenticated Remote Command Execution
- Plugin : Forminator
- Phiên bản lỗi: 1.24.6
- Lỗi : Unauthenticated Remote Command Execution
- 
a) Mô tả
- Forminator là plugin tạo biểu mẫu WordPress dễ sử dụng cho mọi trang web và mọi tình huống. Đây là cách dễ dàng nhất để tạo bất kỳ biểu mẫu nào – biểu mẫu liên hệ, biểu mẫu đặt hàng, biểu mẫu thanh toán, biểu mẫu email, tiện ích phản hồi, cuộc thăm dò tương tác với kết quả theo thời gian thực, câu đố, công cụ ước tính dịch vụ và biểu mẫu đăng ký có thanh toán các tùy chọn bao gồm PayPal và Stripe.

b) Hàm xử lý bị lỗi
- Source code : /forminator/library/modules/custom-forms/front/front-render.php
 ![image](https://github.com/Manh130902/wordpress/assets/93723285/6a0a4741-0835-4476-b4de-9b2865c8699f)

- Source code: /forminator/library/fields/postdata.php
 ![image](https://github.com/Manh130902/wordpress/assets/93723285/667ec333-b052-4904-b9b1-5f1fc5d3f2d1)

c)khai thác 
- Tải 1 tệp lên bắt yêu cầu gửi lên 
 ![image](https://github.com/Manh130902/wordpress/assets/93723285/2960d501-e30f-4a24-b225-3de9576b5808)

Chỉnh sửa yêu cầu gửi lên 
 ![image](https://github.com/Manh130902/wordpress/assets/93723285/276765c2-c2f7-42c6-816f-6e475587f5da)

Payload 
Payload file: test.php

- ![image](https://github.com/Manh130902/wordpress/assets/93723285/ccb54261-0717-42d7-b890-190da53fb1d7)

Kiểm tra thư mục upload,  ta thấy thư mục đã có trong thư mục
 ![image](https://github.com/Manh130902/wordpress/assets/93723285/e3902572-7dd1-41ac-b751-cfe3665caf8b)

Chạy test.php
![image](https://github.com/Manh130902/wordpress/assets/93723285/a3bfd3b6-63c1-4d57-bd10-cf9a5220d2fe)
