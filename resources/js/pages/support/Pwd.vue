<script setup>

import { Head } from '@inertiajs/vue3';
import Mission from '@/components/Mission.vue';
</script>

<template>
  <Head title="취약계층 지원" />
  <h1>취약계층 지원 </h1>

  <div class="w-4/5 md:w-1/2 flex flex-col gap-4">
    <Mission>
      <template #title>장애인 복지 지원</template>
      신체적, 정신적 장애로 인하여 일상생활이 어려운 장애인에게 활동보조
      서비스를 제공함으로써 장애인의 자립생활과 사회참여를 증진시키는 것을 목표로 합니다
    </Mission>

    <Mission>
      <template #title>미망인 복지 지원</template>
      어려움을 겪는 한부모 가정에 주거와 생계를 지원하고 아동을 건전하게 양육할 수 있도록 함으로써, 건강하고 행복한 가정을 이루도록 돕고자 합니다.
    </Mission>

    <Mission>
      <template #title>보육원 지원활동</template>
      일반적인 가정에서도 18세에 독립하기는 어려운데, 보육원에서는 그 나이에 강제로 사회에 나가야 합니다.
      그들이 피해를 겪지 않도록 돕고, 그들이 소외되지 않고 밝은 삶을 살아갈 수 있도록 함께하는 가족이 있다는 사실을 알게 하며, 꿈과 희망을 심어주어 사회에서 중요한 역할을 할수 있도록 지원합니다.
    </Mission>
  </div>

</template>

<style scoped>

</style>