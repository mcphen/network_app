<template>
  <div>
    <skeleton :theme="opacity" :shape="radius" bg-color="#dcdbdc">
     <tb-skeleton  width="30%" :aspect-ratio="1"  :shape="circle" bg-color="#eee"></tb-skeleton>
     <tb-skeleton  width="30%" :aspect-ratio=".3"></tb-skeleton>
     <tb-skeleton  width="30%" :aspect-ratio=".3"></tb-skeleton>
   </skeleton>
  </div>
</template>
<script>
  import {TbSkeleton,Skeleton} from 'tb-skeleton'
  export default {
    name:"Skeleton",
    components: {
      TbSkeleton,
      Skeleton
    }
  }
</script>