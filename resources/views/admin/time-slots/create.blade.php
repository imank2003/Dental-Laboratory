
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   </head>
   <body>
       
       <h2>ساخت پست جدید</h2>
       
       
       <a href="{{ route('admin.time-slots.index') }}">بازگشت</a>
       
       
       
       
     
       
       
       <div class="container">
           
           <div class="card">
               
               <div class="card-header">
                   <h4>ایجاد بازه زمانی</h4>
                </div>
                
                <div class="card-body">
                    
                    <form action="{{ route('admin.time-slots.store') }}" method="POST">
                        
                        @csrf
                        
                        {{-- ساعت شروع --}}
                        <div class="mb-3">
                            <label for="start_time" class="form-label">
                                ساعت شروع
                            </label>
                            
                            <input type="time"
                            id="start_time"
                            name="start_time"
                            class="form-control @error('start_time') is-invalid @enderror"
                            value="{{ old('start_time') }}">
                            
                            @error('start_time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        {{-- ساعت پایان --}}
                        <div class="mb-3">
                            <label for="end_time" class="form-label">
                                ساعت پایان
                            </label>
                            
                            <input type="time"
                            id="end_time"
                            name="end_time"
                            class="form-control @error('end_time') is-invalid @enderror"
                            value="{{ old('end_time') }}">
                            
                            @error('end_time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            ثبت بازه زمانی
                        </button>
                        
                        <a href="{{ route('admin.time-slots.index') }}"
                        class="btn btn-secondary">
                        انصراف
                    </a>
                    
                </form>
                
            </div>
            
        </div>
        
    </div>
    
   </body>
   </html>