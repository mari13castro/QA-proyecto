@extends('activities.layout')
 
@section('content')

    <div class="w-full grid pl-14">


        <div class="my-5">
            
            <form class="grid grid-cols-[20%_20%_20%_20%_15%] gap-2" action="" method="GET">
                <div>
                    <label for="activity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title:</label>
                    <input id="activity" type="text" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="activity" placeholder="Activity Name" >
                </div>
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category:</label>
                    <select id="category" name="category" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0">All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="from_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">From:</label>
                    <input id="from_date" type="date" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="from_date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
                </div>
                <div>
                    <label for="to_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">To:</label>
                    <input id="to_date" type="date" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="to_date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
                </div>
                <div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-[1.9rem]">
                        <img class="" src="https://i.ibb.co/NYk96s9/search.png" alt="create">
                    </button>
                </div>
            </form>
        </div>




        @if ($message = Session::get('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="grid gap-16"> 
            <div class="bg-white py-10 rounded-2xl">
                <h1 class="text-4xl font-bold mt-6 ml-10 mb-10">Activities</h1>
            <div class="grid grid-cols-2 pb-10">
                <a class="ml-40 flex items-center justify-center w-56 text-white bg-indigo-600 hover:bg-indigo-800 focus:ring-2 focus:ring-indigo-300 font-medium rounded-full px-5 py-4 text-center" href="{{ route('activities.create') }}"> Create an Activity 
                <img class="ml-2" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/add--v1.png" alt="create"></a>            
            </div>

            
                <table class="min-w-full text-center text-sm font-light text-surface dark:text-white">
            <thead class="border-b border-neutral-200 bg-neutral-50 font-medium dark:border-white/10 dark:text-neutral-800">
                <tr>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Category</th>
                    <th scope="col" class="px-6 py-3">Tag</th>
                    <th scope="col" class="px-6 py-3">State</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3" width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                <tr class="border-b border-neutral-200 dark:border-white/10">
                    <td>{{ $activity->title }}</td>
                    <td>{{ $activity->category }}</td>
                    <td>{{ $activity->tag }}</td>
                    <td>{{ $activity->status }}</td>
                    <td>{{ $activity->scheduled_at }}</td>
                    <td>
                        <form action="{{ route('activities.destroy',$activity->id) }}" method="POST">
        
                            <a class="text-indigo-500 font-medium text-sm px-5 py-2.5 me-2 mb-2 underline"  href="{{ route('activities.show',$activity->id) }}">Show</a>
            
                            <a class="text-indigo-500 font-medium text-sm px-5 py-2.5 me-2 mb-2 underline" href="{{ route('activities.edit',$activity->id) }}">Edit</a>
        
                            @csrf
                            @method('DELETE')
            
                            <button class="text-red-500 font-medium text-sm px-5 py-2.5 me-2 mb-2 underline" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
                
            </div>
        </div> 

    

    </div>
       
@endsection