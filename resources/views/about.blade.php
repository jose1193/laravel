
@extends('layouts.app')

    @section('titulo')
   About Us
    @endsection
    
    
    @section('container')
    
<nav class="flex my-3" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3 mx-auto">
      <li class="inline-flex items-center">
        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
          <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
          @if(auth()->check()) 
        
          <a href="/dashboard">Home</a>
        </a>
        @else
        <a href="{{route('home')}}">Home</a> 
        @endif
      </li>
      <li>
        <div class="flex items-center">
          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <a href="{{route('about')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white"><a href="/about" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
        </div>
      </li>
     
    </ol>
  </nav>
 
  <h1 class="mb-4 my-5 py-5 text-3xl text-center font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl"><span 
    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
    Learn More</span> @yield('titulo')</h1>


    <!-- Container for demo purpose -->
<div class="container my-24 px-6 mx-auto">

    <!-- Section: Design Block -->
    <section class="mb-32">
      <style>
        @media (min-width: 992px) {
          #cta-img-nml-50 {
            margin-left: 50px;
          }
        }
      </style>
  
      <div class="flex flex-wrap">
        <div class="grow-0 shrink-0 basis-auto w-full lg:w-5/12 mb-12 lg:mb-0 ">
          <div class="flex lg:py-12">
            <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80" class="w-full rounded-lg shadow-lg"
              id="cta-img-nml-50" style="z-index: 10" alt="" />
          </div>
        </div>
  
        <div class="grow-0 shrink-0 basis-auto w-full lg:w-7/12">
          <div
            class=" bg-gradient-to-r to-emerald-600 from-sky-400 h-full rounded-lg p-6 lg:pl-12
             text-white flex items-center text-center lg:text-left">
            <div class="lg:pl-12">
              <h2 class="text-3xl font-bold mb-6">Let it surprise you. Welcome To Web App Budget</h2>
              <p class="mb-6 pb-2 lg:pb-0 text-justify">
                Our system will create a record tab for organization and control of the monthly budget.
                Web App Budget is a professional software platform. Here we will
 provide you with only interesting management tools, which you will like very much.
We are dedicated to bringing you the best in software,
 with a focus on reliability and budget control.
              </p>
  
              <div class="flex flex-col md:flex-row md:justify-around xl:justify-start mb-6 mx-auto">
                <p class="flex items-center mb-4 md:mb-2 lg:mb-0 mx-auto md:mx-0 xl:mr-20 capitalize">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 mr-2">
                    <path fill="currentColor"
                      d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                    </path>
                  </svg>
                  monthly budget
                </p>
  
                <p class="flex items-center mb-4 md:mb-2 lg:mb-0 mx-auto md:mx-0 xl:mr-20 capitalize">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 mr-2">
                    <path fill="currentColor"
                      d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                    </path>
                  </svg>
                  statistics
                </p>
  
                <p class="flex items-center mb-2 lg:mb-0 mx-auto md:mx-0">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 mr-2">
                    <path fill="currentColor"
                      d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                    </path>
                  </svg>
                  Best experience
                </p>
              </div>
  
              <p class="text-justify">
                We're working to turn our passion for Software 
 into a booming online website. We hope you enjoy our Software
 as much as we enjoy offering them to you.<br>
 I will keep posting more important posts on my Website for all of you.
 Please give your support and love.
Thanks For Visiting Our Site<br><br>
Have a nice day!
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Design Block -->
  
  </div>
  <!-- Container for demo purpose -->

    @endsection

   

    