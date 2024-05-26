<template>
    <div class="py-12 welcome bg-cover bg-center" style="background-image: url('https://wallpapercrafter.com/desktop/273537-coffee-shop-coffe-cup-cup-and-saucer-and-table-hd.jpg')">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="content text-center py-8">
            <h1 class="text-4xl font-semibold text-gray-800">About Us</h1>
          </div>
          <div class="cont">
            <div class="story bg-gray-50 text-gray-800 p-8 rounded-lg shadow-md">
              <div class="box">
                <div class="mini-container">
                  <h1>Our Story</h1>
                  <p>Welcome to RJshop, your number one source for all things fashion. We're dedicated to giving you the very best of trendy clothing, with a focus on quality, customer service, and uniqueness. Founded in 2020, RJshop has come a long way from its beginnings. We now serve customers all over the world and are thrilled to be a part of the fashion industry.</p>
                  <h1>Our Mission</h1>
                  <p>Our mission is to provide high-quality fashion products that combine style, comfort, and affordability. We are committed to delivering exceptional value to our customers and inspiring confidence through our unique collections. At RJshop, we strive to stay ahead of the latest fashion trends while maintaining timeless elegance.</p>
                </div>
                <div class="mini-container">
                  <h1>What We Offer</h1>
                  <ul>
                    <li>• Trendy Apparel: Discover a wide range of stylish clothing for all occasions, from casual wear to formal attire.</li><br>
                    <li>• Accessories: Complement your outfits with our collection of accessories, including bags, jewelry, and more.</li><br>
                    <li>• Footwear: Find the perfect pair of shoes to match your style, with options for every season.</li><br>
                    <li>• Exclusive Collections: Enjoy unique and exclusive collections designed to make you stand out.</li><br>
                    <li>• Customer Support: Experience top-notch customer service and support for a seamless shopping experience.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import Mylayout from '@/Layouts/MyLayout.vue';
  import { Link, Head } from '@inertiajs/vue3';
  import { defineProps } from 'vue';
  
  defineOptions({
    layout: Mylayout
  });
  </script>
  
  <style scoped>
  .texts h1 {
    text-shadow: 2px 2px 1px rgba(0, 0, 0, 0.2);
  }
  
  .content h1 {
    text-shadow: 2px 2px 1px rgba(0, 0, 0, 0.2);
    color: #333;
  }
  
  .box {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    padding: 20px;
  }
  
  .mini-container {
    width: 100%;
    padding: 20px;
  }
  
  li {
    text-decoration: none;
  }
  
  .story {
    padding: 50px;
    margin-top: 20px;
  }
  
  .story h1 {
    font-weight: bolder;
    font-size: 2em;
    margin-bottom: 0.5em;
  }
  
  .story p,
  .story ul {
    font-size: 1.2em;
    margin-bottom: 20px;
    text-align: justify;
  }
  
  .story ul {
    list-style-type: none;
    padding-left: 0;
  }
  
  .story ul li::before {
    content: '•';
    color: #ff6347; /* tomato color */
    font-weight: bold;
    display: inline-block;
    width: 1em;
    margin-left: -1em;
  }
  </style>
  