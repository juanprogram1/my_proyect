<x-layouts.app 
        title="home"
                 meta-description="home meta description">
      
        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Home</h1>
@auth 
        <div>
                ha ingresado: {{ Auth::user()->name}}
        </div>
@endauth
        

</x-layouts.app>




        
