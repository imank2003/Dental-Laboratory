<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    </head>
    <body>
    
        <div>
    <h3 style="color: white">trash</h3>
  
    <a href="{{ route('admin.trash.index') }}">
        <x-primary-button>
            trash
        </x-primary-button>
    </a>
</div> 
       
    <div>
    <h3 style="color: white">Services</h3>
    <p style="color: white">{{ $servicesCount }}</p>

    <a href="{{ route('admin.services.index') }}">
        <x-primary-button>
            service
        </x-primary-button>
    </a>
</div>   
    
  <div>
    <h3 style="color: white">portfolios</h3>
    <p style="color: white">{{ $portfoliosCount }}</p>

    <a href="{{ route('admin.portfolios.index') }}">
        <x-primary-button>
            portfolios
        </x-primary-button>
    </a>
</div>   

        
  <div>
    <h3 style="color: white">articles</h3>
    <p style="color: white">{{ $articlesCount }}</p>

    <a href="{{ route('admin.articles.index') }}">
        <x-primary-button>
            articles
        </x-primary-button>
    </a>
</div>   

  <div>
    <h3 style="color: white">tags</h3>
    <p style="color: white">{{ $tagsCount }}</p>

    <a href="{{ route('admin.tags.index') }}">
        <x-primary-button>
            tags
        </x-primary-button>
    </a>
</div>   

  <div>
    <h3 style="color: white">appointments</h3>
    <p style="color: white">{{ $appointmentsCount }}</p>

    <a href="{{ route('admin.appointments.index') }}">
        <x-primary-button>
            appointments
        </x-primary-button>
    </a>
</div>   

  <div>
    <h3 style="color: white">comments</h3>
    <p style="color: white">{{ $commentsCount }}</p>

    <a href="{{ route('admin.comments.index') }}">
        <x-primary-button>
            comments
        </x-primary-button>
    </a>
</div>   

  <div>
    <h3 style="color: white">contacts</h3>
    <p style="color: white">{{ $contactsCount }}</p>

    <a href="{{ route('admin.contacts.index') }}">
        <x-primary-button>
            contacts
        </x-primary-button>
    </a>
</div>   


  <div>
    <h3 style="color: white">timeSlots</h3>
    <p style="color: white">{{ $timeSlotsCount }}</p>

    <a href="{{ route('admin.time-slots.index') }}">
        <x-primary-button>
            timeSlots
        </x-primary-button>
    </a>
</div>  


  <div>
    <h3 style="color: white">news</h3>
    <p style="color: white">{{ $newsCount }}</p>

    <a href="{{ route('admin.news.index') }}">
        <x-primary-button>
            news
        </x-primary-button>
    </a>
</div>  

  <div>
    <h3 style="color: white">about</h3>


    <a href="{{ route('admin.abouts.index') }}">
        <x-primary-button>
            about
        </x-primary-button>
    </a>
</div>  

  <div>
    <h3 style="color: white">settings</h3>
    
    <a href="{{ route('admin.settings.edit' ) }}">
        <x-primary-button>
            settings
        </x-primary-button>
    </a>
</div>  



    </body>
    </html>

    
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
<head>