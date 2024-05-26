<template>
  <div class="py-12 welcome min-h-screen flex items-center justify-center">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white bg-opacity-90 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="content text-center">
          <div class="info">
            <div class="texts">
              <h1 class="text-4xl font-semibold text-gray-800">Welcome to RJShop</h1>
              <p class="mt-4 text-lg text-gray-600">Your ultimate destination for the best shopping experience.</p>
            </div>
          </div>
        </div>
        <div class="about">
          <div class="firstsection">
            <h1 class="text-3xl font-semibold text-gray-800 mb-4">Discover, Shop, and Enjoy!</h1>
            <p class="text-lg text-gray-600 leading-relaxed">At RJShop, we offer a wide variety of products to cater to all your needs. From the latest fashion trends to cutting-edge electronics, we have everything to make your shopping experience unforgettable.</p>
            <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-2">Why Shop with Us?</h2>
            <p class="text-lg text-gray-600 leading-relaxed">We strive to provide the best service and value to our customers. Here's why you should choose RJShop:</p>
            <ul class="text-lg text-gray-600 leading-relaxed list-disc list-inside">
              <li>Wide range of products</li>
              <li>Competitive prices</li>
              <li>Fast and reliable shipping</li>
              <li>Excellent customer service</li>
              <li>Secure online shopping</li>
              <li>Easy returns and exchanges</li>
            </ul>
            <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-2">Join Our Community</h2>
            <p class="text-lg text-gray-600 leading-relaxed">Become part of the RJShop community and enjoy exclusive deals, offers, and updates. Sign up for our newsletter and stay informed about the latest products and promotions.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineOptions({
  layout: MyLayout
});
</script>

<style scoped>
.welcome {
  background-image: url('https://wallpapercrafter.com/desktop/209577-urban-shopping-shop-and-light-hd.jpg');
  background-size: cover;
  background-position: center;
}

.texts h1 {
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.about {
  background-color: rgba(255, 255, 255, 0.9); /* Updated to use RGBA for transparency */
  text-align: center;
  padding: 50px;
  border-radius: 10px;
  margin: 20px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.about p, .about ul {
  font-size: 1.2em;
  margin-bottom: 20px;
  text-align: justify;
}

.about h1, .about h2 {
  font-weight: bolder;
  font-size: 2em;
  margin-bottom: 0.5em;
  color: #333333;
}

.about h2 {
  font-size: 1.5em;
}

.info {
  color: #333333;
  padding: 50px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.content {
  padding: 50px 0;
}

.apply-btn {
  background-color: #f97316;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  transition: background-color 0.3s;
}

.apply-btn:hover {
  background-color: #ea580c;
}
</style>
