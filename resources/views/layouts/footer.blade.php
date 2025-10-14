<footer class="bg-white dark:bg-gray-800 text-gray-300 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main Footer Content -->
        <div class="py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Brand Section -->
            <div class="md:col-span-1">
                <div class="mb-4">
                    <a href="{{ route('dashboard') }}" class="inline-block">
                        <x-application-logo class="block h-10 w-auto fill-current text-indigo-400" />
                    </a>
                </div>
                <p class="text-sm text-gray-400 mb-4">
                    Discover and explore amazing conferences around the world.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-400 hover:text-indigo-400 transition">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-400 transition">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-400 transition">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-400 transition">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-semibold mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-link text-indigo-400"></i> Quick Links
                </h4>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-indigo-400 transition">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('conference.index') }}" class="text-gray-400 hover:text-indigo-400 transition">
                            All Conferences
                        </a>
                    </li>
                    @if(Auth::check())
                        <li>
                            <a href="{{ route('my.conferences') }}" class="text-gray-400 hover:text-indigo-400 transition">
                                My Conferences
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('profile.edit') }}" class="text-gray-400 hover:text-indigo-400 transition">
                            Profile
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Resources -->
            <div>
                <h4 class="text-white font-semibold mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-book text-indigo-400"></i> Resources
                </h4>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="#" class="text-gray-400 hover:text-indigo-400 transition">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-indigo-400 transition">
                            Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-indigo-400 transition">
                            Terms & Conditions
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-indigo-400 transition">
                            Privacy Policy
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="text-white font-semibold mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-envelope text-indigo-400"></i> Newsletter
                </h4>
                <p class="text-sm text-gray-400 mb-4">
                    Subscribe to get updates about new conferences.
                </p>
                <form class="flex">
                    <input type="email" placeholder="Your email"
                           class="flex-1 px-3 py-2 bg-gray-800 text-white rounded-l-lg border border-gray-700 focus:outline-none focus:border-indigo-500 text-sm" />
                    <button type="submit" class="px-3 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-r-lg transition text-sm font-medium">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-800"></div>

        <!-- Bottom Section -->
        <div class="py-6 flex flex-col md:flex-row md:items-center md:justify-between text-sm text-gray-400">
            <p>
                &copy; {{ date('Y') }} Conference Hub. All rights reserved.
            </p>
            <div class="flex gap-6 mt-4 md:mt-0">
                <a href="#" class="hover:text-indigo-400 transition">Privacy</a>
                <a href="#" class="hover:text-indigo-400 transition">Terms</a>
                <a href="#" class="hover:text-indigo-400 transition">Cookies</a>
                <a href="#" class="hover:text-indigo-400 transition">Sitemap</a>
            </div>
        </div>
    </div>
</footer>
