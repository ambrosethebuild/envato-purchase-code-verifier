<livewire:styles />
{{-- custom style --}}
<style>
    body {
        padding: 0px;
        margin: 0px;
    }

    .h-screen {
        height: 100vh;
    }

    .bg-green-400 {
        background-color: #68D391;
    }

    .bg-white {
        background-color: #fff;
    }

    .py-20 {
        padding-top: 5rem;
        padding-bottom: 5rem;
    }

    @media (min-width: 1536px) {
        .2xl\:py-40 {
            padding-top: 10rem;
            padding-bottom: 10rem;
        }
    }

    .overflow-hidden {
        overflow: hidden;
    }

    /* All class must be from tailwindcss */
    /* container px-4 mx-auto */
    .container {
        width: 100%;
        padding-right: 1rem;
        padding-left: 1rem;
        margin-right: auto;
        margin-left: auto;
    }

    .px-4 {
        padding-right: 1rem;
        padding-left: 1rem;
    }

    .px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    .px-12 {
        padding-left: 3rem;
        padding-right: 3rem;
    }

    .mx-auto {
        margin-right: auto;
        margin-left: auto;
    }

    .p-2 {
        padding: 0.5rem;
    }

    .py-8 {
        padding-top: 2rem;
        padding-bottom: 2rem;
    }

    .py-12 {
        padding-top: 3rem;
        padding-bottom: 3rem;
    }

    .my-4 {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .mt-8 {
        margin-top: 2rem;
    }

    .mb-12 {
        margin-bottom: 3rem;
    }

    .max-w-5xl {
        max-width: 64rem;
    }

    .max-w-4xl {
        max-width: 56rem;
    }

    .max-w-3xl {
        max-width: 48rem;
    }

    .max-w-2xl {
        max-width: 42rem;
    }

    .flex {
        display: flex;
    }

    .flex-wrap {
        flex-wrap: wrap;
    }

    .items-center {
        align-items: center;
    }

    .-mx-10 {
        margin-left: -2.5rem;
        margin-right: -2.5rem;
    }

    .px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    .w-full {
        width: 100%;
    }



    .px-10 {
        padding-left: 2.5rem;
        padding-right: 2.5rem;
    }

    .mb-16 {
        margin-bottom: 4rem;
    }

    .order-first {
        order: -1;
    }

    /* start TEXT */
    .text-red-500 {
        color: #f56565;
    }

    .text-sm {
        font-size: 0.875rem;
    }

    .text-lg {
        font-size: 1.125rem;
    }

    .text-center {
        text-align: center;
    }

    .text-white {
        color: #fff;
    }

    .text-5xl {
        font-size: 3rem;
    }

    .text-6xl {
        font-size: 3.75rem;
    }

    .text-green-600 {
        color: #059669;
    }

    .font-bold {
        font-weight: 700;
    }

    .font-heading {
        font-family: 'Poppins', sans-serif;
    }

    /* END TEXT */

    .max-w-md {
        max-width: 28rem;
    }

    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    .grid {
        display: grid;
    }

    .grid-cols-1 {
        grid-template-columns: repeat(1, minmax(0, 1fr));
    }

    .grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .grid-cols-4 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .gap-4 {
        gap: 1rem;
    }

    .gap-2 {
        gap: 0.5rem;
    }

    /* large screens */
    @media (min-width: 1024px) {
        .lg\:mb-0 {
            margin-bottom: 0;
        }

        .lg\:order-last {
            order: 2;
        }

        .lg\:px-20 {
            padding-left: 5rem;
            padding-right: 5rem;
        }

        .lg\:w-1/2 {
            width: 50%;
        }

        .lg\:py-24 {
            padding-top: 6rem;
            padding-bottom: 6rem;
        }

        .lg\:py-24 {
            padding-top: 6rem;
            padding-bottom: 6rem;
        }

        .lg\:px-20 {
            padding-left: 5rem;
            padding-right: 5rem;
        }

    }

    /* medium screens */
    @media (min-width: 768px) {
        .md\:grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }


    /* Margin and Padding */
    .mb-10 {
        margin-bottom: 2.5rem;
    }

    .pl-6 {
        padding-left: 1.5rem;
    }

    .pl-4 {
        padding-left: 1rem;
    }

    /* Tailwind uses specific values; choose the most appropriate if there's a conflict */
    .pr-3 {
        padding-right: 0.75rem;
    }

    .pr-6 {
        padding-right: 1.5rem;
    }

    .py-2 {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .py-4 {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .mt-1 {
        margin-top: 0.25rem;
    }

    .mt-3 {
        margin-top: 0.75rem;
    }

    .mt-4 {
        margin-top: 1rem;
    }

    .mt-6 {
        margin-top: 1.5rem;
    }

    /* Typography */
    .text-2xl {
        font-size: 1.5rem;
    }

    .font-bold {
        font-weight: bold;
    }

    .text-xs {
        font-size: 0.75rem;
    }

    .text-red-700 {
        color: #ef4444;
    }

    .text-center {
        text-align: center;
    }

    /* Layout */
    .flex {
        display: flex;
    }

    .items-center {
        align-items: center;
    }

    .inline-block {
        display: inline-block;
    }

    .w-5 {
        width: 1.25rem;
    }

    .w-full {
        width: 100%;
    }

    .h-5 {
        height: 1.25rem;
    }

    /* Borders and Background */
    .border-0 {
        border-width: 0;
    }

    .border {
        border: 1px solid transparent;
    }

    .border-gray-300 {
        border-color: #d1d5db;
    }

    .border-r {
        border-right: 1px solid;
    }

    .border-gray-50 {
        border-right-color: #f9fafb;
    }

    .bg-white {
        background-color: #ffffff;
    }

    .bg-green-500 {
        background-color: #10b981;
    }


    .rounded-sm {
        border-radius: 0.25rem;
    }

    .rounded-full {
        border-radius: 9999px;
    }

    .rounded-r-full {
        border-top-right-radius: 9999px;
        border-bottom-right-radius: 9999px;
    }

    .rounded-xl {
        border-radius: 0.75rem;
    }

    /* States and Others */
    :focus {
        outline: none;
    }

    .shadow-xs {
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05);
    }

    /* This needs to be used with a specific class, e.g., .input:focus { outline: none; } */
    .hover\:bg-green-600:hover {
        background-color: #059669;
    }

    /* Custom class for hover state */
    .transition {
        transition: background-color 200ms;
    }

    .duration-200 {
        transition-duration: 200ms;
    }

    .placeholder-gray-400::placeholder {
        color: #9ca3af;
    }

    .hover\:bg-green-600 {
        background-color: #059669;
    }

    .bg-green-600::hover {
        background-color: #059669;
    }

    /*
fixed top-0 bottom-0 left-0 z-50 w-full h-full
fixed top-0 bottom-0 left-0 w-full h-full bg-black opacity-75
fixed top-0 bottom-0 left-0 flex items-center justify-center w-full h-full
*/
    /* loading style */
    .fixed {
        position: fixed;
    }

    .top-0 {
        top: 0;
    }

    .bottom-0 {
        bottom: 0;
    }

    .left-0 {
        left: 0;
    }

    .z-50 {
        z-index: 50;
    }

    .h-full {
        height: 100%;
    }


    .bg-black {
        background-color: #000;
    }

    .opacity-75 {
        opacity: 0.75;
    }




    .justify-center {
        justify-content: center;
    }

    /* end loading style */
</style>
