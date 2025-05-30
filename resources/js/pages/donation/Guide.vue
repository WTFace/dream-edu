<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue';
import Donation from '@/components/Donation.vue';

const quotes = [
  {
    quote: 'No one has ever become poor by giving.',
    by: '— Anne Frank'
  },
  {
    quote: 'We make a living by what we get, but we make a life by what we give.',
    by: '— Winston Churchill'
  },
  {
    quote: 'It’s not how much we give but how much love we put into giving.',
    by: '— Mother Teresa'
  },
  {
    quote: 'The meaning of life is to find your gift. The purpose of life is to give it away.',
    by: '— Pablo Picasso'
  },
  {
    quote: 'Giving is not just about making a donation. It is about making a difference.',
    by: '— Kathy Calvin'
  },
  {
    quote: 'Happiness doesn’t result from what we get, but from what we give.',
    by: '— Ben Carson'
  },
  {
    quote: 'The best way to find yourself is to lose yourself in the service of others.',
    by: '— Mahatma Gandhi'
  },
  {
    quote: 'No one is useless in this world who lightens the burden of another.',
    by: '— Charles Dickens'
  },
  {
    quote: 'Act as if what you do makes a difference. It does.',
    by: '— William James'
  },
  {
    quote: 'Charity brings to life again those who are spiritually dead.',
    by: '— Thomas Aquinas'
  }
];

const index = ref(0);

const currentQuote = computed(() => quotes[index.value]);

let intervalId;

onMounted(() => {
  intervalId = setInterval(() => {
    index.value = (index.value + 1) % quotes.length;
  }, 12000);
});

onUnmounted(() => {
  clearInterval(intervalId);
});


</script>

<template>
  <div>
    <img class="max-h-[200px]"
         src="https://lh3.googleusercontent.com/aY38gs_osXwZlJpf4WbnZSKADF9-jZeQRqzkQBWHELKTIy-PWjixCmHnR44VyFPhgRoXiu_gwv50YTYmFGzrO-FQFoDMQpbLFL9aDpod=s0"
         alt="donation">
  </div>
  <div class="flex flex-col md:flex-row gap-6 md:gap-16">
    <Donation title="정기후원">
      <div>
        꾸준히 일정 금액을 후원함으로 지속적인 변화를 만듭니다.
      </div>
      <button class="my-2 px-3 py-1 bg-blue-500 text-white rounded">정기후원 신청</button>
    </Donation>
    <Donation title="일시후원">
      <div class="p-2">
        농협 301-0366-874081
      </div>
    </Donation>
    <Donation title="물품후원">
      후원이 꼭 돈일 필요는 없습니다. 식품, 생필품이나 기업의 제품 등을 후원할 수 있습니다.
    </Donation>
  </div>

  <div class="text-center mt-4 md:mt-6">
    <p class="md:text-xl font-semibold italic">"{{ currentQuote.quote }}"</p>
    <p class="mt-2 text-gray-600 dark:text-neutral-200">{{ currentQuote.by }}</p>
  </div>
</template>

<style scoped>

</style>