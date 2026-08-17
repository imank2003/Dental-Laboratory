<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>رزرو نوبت</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;

            font-family: Tahoma, Arial, sans-serif;

            background: #f5f6f8;

            color: #222;
        }


        .appointment-container {

            width: 100%;

            max-width: 700px;

            margin: 50px auto;

            padding: 20px;
        }


        .appointment-card {

            background: #ffffff;

            border-radius: 18px;

            padding: 35px;

            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }


        .appointment-title {

            text-align: center;

            margin: 0 0 10px;

            font-size: 28px;
        }


        .appointment-description {

            text-align: center;

            color: #777;

            margin: 0 0 35px;

            line-height: 1.8;
        }



        .steps {

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 35px;
        }


        .step {

            width: 38px;

            height: 38px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #eeeeee;

            color: #777;

            font-weight: bold;

            transition: 0.2s;
        }


        .step.active,
        .step.completed {

            background: #222;

            color: #fff;
        }


        .step-line {

            width: 55px;

            height: 2px;

            background: #eeeeee;

            transition: 0.2s;
        }


        .step-line.active {

            background: #222;
        }


        .step-content h2 {

            margin: 0 0 8px;

            font-size: 21px;
        }


        .step-content p {

            color: #777;

            margin-top: 0;

            margin-bottom: 25px;

            font-size: 14px;

            line-height: 1.8;
        }


        
        .form-group {

            margin-bottom: 22px;
        }


        .form-group label {

            display: block;

            margin-bottom: 9px;

            font-weight: bold;
        }


        .required {

            color: #d32f2f;
        }


        .form-control {

            width: 100%;

            padding: 14px;

            border: 1px solid #dddddd;

            border-radius: 11px;

            font-size: 15px;

            outline: none;

            background: #ffffff;

            transition: 0.2s;
        }


        .form-control:focus {

            border-color: #222;

            box-shadow:
                0 0 0 3px
                rgba(0, 0, 0, 0.05);
        }


        textarea.form-control {

            min-height: 120px;

            resize: vertical;

            line-height: 1.8;
        }



        .time-slots {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 12px;

            margin-top: 10px;
        }


        .time-slot {

            position: relative;
        }


        .time-slot input {

            position: absolute;

            opacity: 0;

            pointer-events: none;
        }


        .time-slot label {

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 15px;

            border: 1px solid #dddddd;

            border-radius: 11px;

            cursor: pointer;
            background: #fff;

            transition: 0.2s;

            font-weight: normal;
        }


        .time-slot label:hover {

            border-color: #222;

            background: #fafafa;
        }


        .time-slot input:checked + label {

            background: #222;

            color: #fff;

            border-color: #222;
        }



        .summary {

            background: #f8f8f8;

            border-radius: 14px;

            padding: 20px;

            margin-bottom: 25px;
        }


        .summary-title {

            font-size: 17px;

            font-weight: bold;

            margin-bottom: 18px;
        }


        .summary-item {

            display: flex;

            justify-content: space-between;

            gap: 20px;

            padding: 12px 0;

            border-bottom: 1px solid #e5e5e5;

            font-size: 14px;
        }


        .summary-item:last-child {

            border-bottom: none;

            padding-bottom: 0;
        }


        .summary-label {

            color: #777;

            white-space: nowrap;
        }


        .summary-value {

            font-weight: bold;

            text-align: left;

            word-break: break-word;
        }



        .buttons {

            display: flex;

            gap: 12px;

            margin-top: 25px;
        }


        .next-btn,
        .back-btn {

            border: none;

            border-radius: 11px;

            padding: 14px;

            font-size: 16px;

            cursor: pointer;

            transition: 0.2s;
        }


        .next-btn {

            flex: 1;

            background: #222;

            color: #fff;
        }


        .back-btn {

            flex: 0.4;

            background: #eeeeee;

            color: #222;
        }


        .next-btn:hover,
        .back-btn:hover {

            opacity: 0.9;
        }


        .next-btn:disabled {

            opacity: 0.6;

            cursor: not-allowed;
        }



        .loading {

            display: none;

            color: #777;

            font-size: 14px;

            margin-top: 10px;
        }


        .no-slots {

            display: none;

            color: #b42318;

            background: #fff0f0;

            padding: 12px;

            border-radius: 10px;

            margin-top: 12px;

            font-size: 14px;
        }


        .error-message {

            background: #fff0f0;

            color: #b42318;

            padding: 12px 15px;

            border-radius: 10px;

            margin-bottom: 20px;
        }


        .error-message ul {

            margin: 0;

            padding-right: 20px;
        }



        @media (max-width: 600px) {

            .appointment-container {

                margin: 20px auto;

                padding: 12px;
            }


            .appointment-card {

                padding: 22px;
            }


            .appointment-title {

                font-size: 24px;
            }


            .step-line {

                width: 30px;
            }


            .time-slots {

                grid-template-columns: 1fr;
            }


            .buttons {

                flex-direction: column-reverse;
            }


            .back-btn {

                flex: 1;
            }


            .summary-item {

                flex-direction: column;

                gap: 5px;
            }


            .summary-value {

                text-align: right;
            }

        }

    </style>

</head>


<body>


<div class="appointment-container">

    <div class="appointment-card">

        <h1 class="appointment-title">

            رزرو نوبت

        </h1>


        <p class="appointment-description">

            برای دریافت نوبت، مراحل زیر را به ترتیب تکمیل کنید.

        </p>


      
        <div class="steps">


            <div
                id="stepIndicator1"
                class="step active">

                ۱

            </div>


            <div
                id="line1"
                class="step-line">

            </div>


            <div
                id="stepIndicator2"
                class="step">

                ۲

            </div>


            <div
                id="line2"
                class="step-line">

            </div>


            <div
                id="stepIndicator3"
                class="step">

                ۳

            </div>


            <div
                id="line3"
                class="step-line">

            </div>


            <div
                id="stepIndicator4"
                class="step">

                ۴

            </div>

        </div>



        @if($errors->any())

            <div class="error-message">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>

                            {{ $error }}

                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        <form
            id="appointmentForm"
            action="{{ route('appointments.store') }}"
            method="POST">

            @csrf


       
            <div
                id="step1"
                class="step-content">


                <h2>

                    انتخاب تاریخ

                </h2>


                <p>

                    ابتدا تاریخی که می‌خواهید نوبت خود را دریافت کنید انتخاب کنید.

                </p>


                <div class="form-group">

                    <label for="appointment_date">

                        تاریخ رزرو

                        <span class="required">

                            *

                        </span>

                    </label>


                    <input
                        type="date"
                        id="appointment_date"
                        name="appointment_date"
                        class="form-control"
                        min="{{ now()->format('Y-m-d') }}"
                        value="{{ old('appointment_date') }}"
                        required>

                </div>


                <button
                    type="button"
                    id="nextStep1"
                    class="next-btn">

                    ادامه

                </button>

            </div>



            <div
                id="step2"
                class="step-content"
                style="display: none;">


                <h2>

                    انتخاب ساعت

                </h2>


                <p>

                    یکی از ساعت‌های آزاد برای تاریخ انتخاب‌شده را انتخاب کنید.

                </p>


                <div
                    id="timeSlots"
                    class="time-slots">

                </div>


                <div
                    id="loadingMessage"
                    class="loading">

                    در حال دریافت ساعت‌های آزاد...

                </div>
                <div
                    id="noSlotsMessage"
                    class="no-slots">

                    برای این تاریخ هیچ ساعت آزادی وجود ندارد.

                </div>


                <div class="buttons">


                    <button
                        type="button"
                        id="backStep2"
                        class="back-btn">

                        بازگشت

                    </button>


                    <button
                        type="button"
                        id="nextStep2"
                        class="next-btn">

                        ادامه

                    </button>

                </div>

            </div>



            <div
                id="step3"
                class="step-content"
                style="display: none;">


                <h2>

                    اطلاعات تماس

                </h2>


                <p>

                    اطلاعات خود را وارد کنید تا بتوانیم با شما در ارتباط باشیم.

                </p>



                <div class="form-group">

                    <label for="full_name">

                        نام و نام خانوادگی

                        <span class="required">

                            *

                        </span>

                    </label>


                    <input
                        type="text"
                        id="full_name"
                        name="full_name"
                        class="form-control"
                        placeholder="مثلاً ایمان احمدی"
                        value="{{ old('full_name') }}"
                        required>

                </div>


  
                <div class="form-group">

                    <label for="phone">

                        شماره تماس

                        <span class="required">

                            *

                        </span>

                    </label>


                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        class="form-control"
                        placeholder="مثلاً 09123456789"
                        value="{{ old('phone') }}"
                        required>

                </div>


              
                <div class="form-group">

                    <label for="email">

                        ایمیل

                        <span style="color:#777;font-weight:normal;">

                            (اختیاری)

                        </span>

                    </label>


                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        placeholder="example@email.com"
                        value="{{ old('email') }}">

                </div>


                <div class="buttons">


                    <button
                        type="button"
                        id="backStep3"
                        class="back-btn">

                        بازگشت

                    </button>


                    <button
                        type="button"
                        id="nextStep3"
                        class="next-btn">

                        ادامه

                    </button>

                </div>

            </div>



            <div
                id="step4"
                class="step-content"
                style="display: none;">


                <h2>

                    بررسی و ثبت نهایی

                </h2>


                <p>
                    اطلاعات رزرو خود را بررسی کنید و در صورت صحیح بودن، رزرو را ثبت کنید.

                </p>



                <div class="summary">


                    <div class="summary-title">

                        خلاصه رزرو شما

                    </div>



                    <div class="summary-item">

                        <span class="summary-label">

                            تاریخ رزرو

                        </span>


                        <span
                            id="summaryDate"
                            class="summary-value">

                            -

                        </span>

                    </div>



                    <div class="summary-item">

                        <span class="summary-label">

                            ساعت

                        </span>


                        <span
                            id="summaryTime"
                            class="summary-value">

                            -

                        </span>

                    </div>


                
                    <div class="summary-item">

                        <span class="summary-label">

                            نام و نام خانوادگی

                        </span>


                        <span
                            id="summaryName"
                            class="summary-value">

                            -

                        </span>

                    </div>



                    <div class="summary-item">

                        <span class="summary-label">

                            شماره تماس

                        </span>


                        <span
                            id="summaryPhone"
                            class="summary-value">

                            -

                        </span>

                    </div>



                    <div class="summary-item">

                        <span class="summary-label">

                            ایمیل

                        </span>


                        <span
                            id="summaryEmail"
                            class="summary-value">

                            -

                        </span>

                    </div>


                </div>


                <div class="form-group">


                    <label for="description">

                        توضیحات

                        <span style="color:#777;font-weight:normal;">

                            (اختیاری)

                        </span>

                    </label>


                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        placeholder="اگر توضیح یا درخواست خاصی دارید اینجا بنویسید...">{{ old('description') }}</textarea>

                </div>



                <div class="buttons">


                    <button
                        type="button"
                        id="backStep4"
                        class="back-btn">

                        بازگشت

                    </button>


                    <button
                        type="submit"
                        id="submitBtn"
                        class="next-btn">

                        ثبت نهایی رزرو

                    </button>

                </div>

            </div>


        </form>

    </div>

</div>


<script>



    const step1 =
        document.getElementById('step1');

    const step2 =
        document.getElementById('step2');
        const step3 =
        document.getElementById('step3');

    const step4 =
        document.getElementById('step4');



    const appointmentDate =
        document.getElementById('appointment_date');

    const timeSlots =
        document.getElementById('timeSlots');


    
    const loadingMessage =
        document.getElementById('loadingMessage');

    const noSlotsMessage =
        document.getElementById('noSlotsMessage');


    

    const nextStep1 =
        document.getElementById('nextStep1');

    const backStep2 =
        document.getElementById('backStep2');

    const nextStep2 =
        document.getElementById('nextStep2');

    const backStep3 =
        document.getElementById('backStep3');

    const nextStep3 =
        document.getElementById('nextStep3');

    const backStep4 =
        document.getElementById('backStep4');




    const stepIndicator1 =
        document.getElementById('stepIndicator1');

    const stepIndicator2 =
        document.getElementById('stepIndicator2');

    const stepIndicator3 =
        document.getElementById('stepIndicator3');

    const stepIndicator4 =
        document.getElementById('stepIndicator4');


    const line1 =
        document.getElementById('line1');

    const line2 =
        document.getElementById('line2');

    const line3 =
        document.getElementById('line3');


  

    nextStep1.addEventListener(
        'click',
        function () {


            const date =
                appointmentDate.value;


            if (!date) {

                alert(
                    'لطفاً ابتدا تاریخ رزرو را انتخاب کنید.'
                );

                return;
            }


            loadingMessage.style.display =
                'block';


            noSlotsMessage.style.display =
                'none';


            timeSlots.innerHTML =
                '';


            nextStep1.disabled =
                true;


            fetch(
                "{{ route('appointments.time-slots') }}",
                {

                    method: "POST",

                    headers: {

                        "Content-Type":
                            "application/json",

                        "X-CSRF-TOKEN":
                            "{{ csrf_token() }}",

                        "Accept":
                            "application/json"

                    },

                    body: JSON.stringify({

                        appointment_date:
                            date

                    })

                }
            )


            .then(function (response) {

                if (!response.ok) {

                    throw new Error(
                        'خطا در دریافت ساعت‌ها'
                    );

                }

                return response.json();

            })


            .then(function (data) {


                loadingMessage.style.display =
                    'none';


                if (
                    !data ||
                    data.length === 0
                ) {

                    noSlotsMessage.style.display =
                        'block';

                        nextStep1.disabled =
                        false;

                    return;
                }


                data.forEach(
                    function (slot) {


                        const wrapper =
                            document.createElement('div');


                        wrapper.className =
                            'time-slot';


                        const input =
                            document.createElement('input');


                        input.type =
                            'radio';


                        input.name =
                            'time_slot_id';


                        input.value =
                            slot.id;


                        input.id =
                            'time_slot_' +
                            slot.id;


                        const label =
                            document.createElement('label');


                        label.htmlFor =
                            'time_slot_' +
                            slot.id;


                        label.textContent =
                            slot.start_time +
                            ' - ' +
                            slot.end_time;


                        wrapper.appendChild(
                            input
                        );


                        wrapper.appendChild(
                            label
                        );


                        timeSlots.appendChild(
                            wrapper
                        );

                    }
                );


                step1.style.display =
                    'none';


                step2.style.display =
                    'block';


                stepIndicator1.classList.add(
                    'completed'
                );


                stepIndicator2.classList.add(
                    'active'
                );


                line1.classList.add(
                    'active'
                );


                nextStep1.disabled =
                    false;

            })


            .catch(function (error) {


                console.error(error);


                loadingMessage.style.display =
                    'none';


                nextStep1.disabled =
                    false;


                alert(
                    'در دریافت ساعت‌های آزاد مشکلی پیش آمد.'
                );

            });

        }
    );




    backStep2.addEventListener(
        'click',
        function () {


            step2.style.display =
                'none';


            step1.style.display =
                'block';


            stepIndicator2.classList.remove(
                'active'
            );


            stepIndicator1.classList.remove(
                'completed'
            );


            line1.classList.remove(
                'active'
            );

        }
    );


  

    nextStep2.addEventListener(
        'click',
        function () {


            const selectedTimeSlot =
                document.querySelector(
                    'input[name="time_slot_id"]:checked'
                );


            if (!selectedTimeSlot) {

                alert(
                    'لطفاً ابتدا یک ساعت را انتخاب کنید.'
                );

                return;
            }


            step2.style.display =
                'none';


            step3.style.display =
                'block';


            stepIndicator2.classList.remove(
                'active'
            );


            stepIndicator2.classList.add(
                'completed'
            );
            stepIndicator3.classList.add(
                'active'
            );


            line2.classList.add(
                'active'
            );

        }
    );




    backStep3.addEventListener(
        'click',
        function () {


            step3.style.display =
                'none';


            step2.style.display =
                'block';


            stepIndicator3.classList.remove(
                'active'
            );


            stepIndicator2.classList.remove(
                'completed'
            );


            stepIndicator2.classList.add(
                'active'
            );


            line2.classList.remove(
                'active'
            );

        }
    );




    nextStep3.addEventListener(
        'click',
        function () {


            const fullName =
                document.getElementById(
                    'full_name'
                ).value.trim();


            const phone =
                document.getElementById(
                    'phone'
                ).value.trim();


            if (!fullName) {

                alert(
                    'لطفاً نام و نام خانوادگی را وارد کنید.'
                );

                return;
            }


            if (!phone) {

                alert(
                    'لطفاً شماره تماس را وارد کنید.'
                );

                return;
            }


    

            const selectedTimeSlot =
                document.querySelector(
                    'input[name="time_slot_id"]:checked'
                );


            const selectedTimeText =
                selectedTimeSlot
                    .nextElementSibling
                    .textContent;


    

            document.getElementById(
                'summaryDate'
            ).textContent =
                appointmentDate.value;


            document.getElementById(
                'summaryTime'
            ).textContent =
                selectedTimeText;


            document.getElementById(
                'summaryName'
            ).textContent =
                fullName;


            document.getElementById(
                'summaryPhone'
            ).textContent =
                phone;


            const email =
                document.getElementById(
                    'email'
                ).value.trim();


            document.getElementById(
                'summaryEmail'
            ).textContent =
                email
                    ? email
                    : 'وارد نشده';


            

            step3.style.display =
                'none';


            step4.style.display =
                'block';


       
           stepIndicator3.classList.remove(
                'active'
            );


            stepIndicator3.classList.add(
                'completed'
            );


            stepIndicator4.classList.add(
                'active'
            );


            line3.classList.add(
                'active'
            );

        }
    );



    backStep4.addEventListener(
        'click',
        function () {


            step4.style.display =
                'none';


            step3.style.display =
                'block';


            stepIndicator4.classList.remove(
                'active'
            );


            stepIndicator3.classList.remove(
                'completed'
            );


            stepIndicator3.classList.add(
                'active'
            );


            line3.classList.remove(
                'active'
            );

        }
    );



    document
        .getElementById('appointmentForm')
        .addEventListener(
            'submit',
            function () {


                const submitBtn =
                    document.getElementById(
                        'submitBtn'
                    );


                submitBtn.disabled =
                    true;


                submitBtn.textContent =
                    'در حال ثبت...';

            }
        );


</script>


</body>

</html>