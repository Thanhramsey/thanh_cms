@extends('layouts.portal')
@section('content')
    <section class="contact-sec" id="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-3 text-center">
                    <div class="user-img">
                        @if ($logo && $logo->value)
                            <img src="{{ asset($logo->value) }}" title="logo" alt="logo" class="logo-default">
                        @else
                            <img src="{{ asset('portal_assets/img/default-logo.png') }}" title="default-logo"
                                alt="default-logo" class="logo-default">
                        @endif
                    </div>
                    <h4 class="user-name">MegaOne Hosts</h4>
                    <p class="user-designation">email@website.com</p>
                    <p class="user-designation">+1 631 123 4567</p>
                </div>
                <div class="col-12 col-md-9">
                    <div class="col-12 hidden" id="result"></div>
                    <form class="row contact-form row-padding" id="contact-form-data">
                        <div class="col-12 col-md-6">

                            <div class="col-12">
                                <input type="text" name="subject" placeholder="Tiêu đề" class="form-control">
                                <input type="text" name="name" placeholder="Name" class="form-control">
                                <input type="text" name="phone" placeholder="Contact No" class="form-control">

                                <input type="date" name="pick_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="col-12 contact-form">
                                <input type="email" name="email" placeholder="Email" class="form-control">
                                <input type="text" name="address" placeholder="Địa chỉ" class="form-control">
                                <textarea class="form-control" name="message" rows="6" placeholder="Nhập câu hỏi của bạn"></textarea>
                                <button type="submit"
                                    class="btn btn-medium btn-rounded btn-trans-white rounded-pill w-100 contact_btn main-font">
                                    Gửi câu hỏi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('contact-form-data').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            const resultDiv = document.getElementById('result');
            resultDiv.innerText = 'Đang gửi...'; // Hiển thị trạng thái đang gửi
            resultDiv.className = ''; // Reset class

            fetch('{{ route('portal.contact.store') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    resultDiv.innerText = data.success || data.error || 'Có lỗi xảy ra.';
                    if (data.success) {
                        resultDiv.className = 'success';
                        this.reset();
                    } else if (data.error) {
                        resultDiv.className = 'error';
                    } else {
                        resultDiv.className = 'error';
                    }

                    // Ẩn thông báo sau 5 giây
                    setTimeout(() => {
                        resultDiv.classList.add('hidden');
                    }, 5000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    resultDiv.innerText = 'Đã có lỗi xảy ra. Vui lòng thử lại sau.';
                    resultDiv.className = 'error';
                    setTimeout(() => {
                        resultDiv.classList.add('hidden');
                    }, 5000);
                });

            // Hiển thị lại div result trước khi fetch
            resultDiv.classList.remove('hidden');
        });
    </script>
@endsection
