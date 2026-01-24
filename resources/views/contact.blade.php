<x-layout>
    <form action="{{ route('contact.send') }}" class="mx-auto max-w-md space-y-4 rounded-lg border border-gray-300 bg-gray-100 p-6" method="POST">
    @csrf
    <div>
        <label class="block text-sm font-medium text-gray-900" for="name">Name</label>
        <input 
            class="mt-1 w-full rounded-lg border border-gray-300 p-3 focus:border-violet-500 focus:outline-none focus:ring-1 focus:ring-violet-500 shadow-sm" 
            name="name"
            id="name" 
            type="text" 
            placeholder="Your name"
            required
        >  
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-900" for="email">Email</label>
        <input 
            class="mt-1 w-full rounded-lg border border-gray-300 p-3 focus:border-violet-500 focus:outline-none focus:ring-1 focus:ring-violet-500 shadow-sm" 
            name="email"
              id="email" 
            type="email" 
            placeholder="Your Mail Subject"
            required
        >  
    </div>

    <div>
            <label class="block text-sm font-medium text-gray-900" for="subject">Subject</label>
            <input 
                class="mt-1 w-full rounded-lg border border-gray-300 p-3 focus:border-violet-500 focus:outline-none focus:ring-1 focus:ring-violet-500 shadow-sm" 
                name="subject"
                id="subject" 
                type="text" 
                placeholder="Your Subject Title"
                required
            >  
        </div>

    <div>
        <label class="block text-sm font-medium text-gray-900" for="message">Message</label>
        <textarea 
            name="message"
            class="mt-1 w-full resize-none rounded-lg border border-gray-300 p-3 focus:border-violet-500 focus:outline-none focus:ring-1 focus:ring-violet-500 shadow-sm" 
            id="message" 
            rows="4" 
            placeholder="Your message"
            required
        ></textarea>  
    </div>

  <button class="block w-full rounded-lg border border-violet-600 bg-violet-600 px-12 py-3 text-sm font-medium text-white transition-colors hover:bg-transparent hover:text-violet-600" type="submit">
    Send Message
  </button>
</form>
    <x-slot:footer>
        <strong>Contact Page</strong>
    </x-slot:footer>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Contact Kami
    </div>
</x-layout>