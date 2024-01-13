<template>
  <div class="work">
    <img :src="'http://localhost' + data.bigImage" alt="">
    <div class="icon">
      <div class="icon-comment">
        <svg width="22" height="15" viewBox="0 0 22 15" fill="black" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M17.3603 10.6246C18.7437 9.62741 19.3741 8.4249 19.3741 7.2973C19.3741 6.16971 18.7437 4.96719 17.3603 3.96999C15.9798 2.97482 13.9719 2.2973 11.6631 2.2973C9.35434 2.2973 7.3465 2.97482 5.96594 3.96999C5.86224 4.04474 5.76276 4.12065 5.66747 4.19759L3.87117 3.65414L4.91573 4.92133C4.25944 5.68626 3.95216 6.51004 3.95216 7.2973C3.95216 8.4249 4.58253 9.62741 5.96594 10.6246C7.3465 11.6198 9.35434 12.2973 11.6631 12.2973C13.9719 12.2973 15.9798 11.6198 17.3603 10.6246ZM11.6631 14.2973C17.0264 14.2973 21.3741 11.1633 21.3741 7.2973C21.3741 3.4313 17.0264 0.297302 11.6631 0.297302C8.90759 0.297302 6.4201 1.1246 4.65263 2.45343L0.0389404 1.05763L2.80903 4.41809C2.25857 5.29628 1.95216 6.271 1.95216 7.2973C1.95216 11.1633 6.29991 14.2973 11.6631 14.2973Z"/>
        </svg>
        <span>5</span>
      </div>
      <div @click="originImage" class="icon-download">
        <svg width="20" height="18" viewBox="0 0 20 18" fill="black" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53711 0.864441C10.0894 0.864441 10.5371 1.31216 10.5371 1.86444V9.40371L13.7673 6.17349C14.1579 5.78297 14.791 5.78297 15.1815 6.17349C15.5721 6.56401 15.5721 7.19718 15.1815 7.5877L10.2124 12.5569C10.0593 12.7099 9.86899 12.803 9.67062 12.8361C9.61589 12.8452 9.56055 12.8498 9.50521 12.8498C9.24929 12.8498 8.99337 12.7521 8.79811 12.5569L3.82893 7.5877C3.4384 7.19718 3.4384 6.56401 3.82893 6.17349C4.21945 5.78297 4.85262 5.78297 5.24314 6.17349L8.53711 9.46746V1.86444C8.53711 1.31216 8.98482 0.864441 9.53711 0.864441ZM2.11273 5.42475C2.11273 4.87247 1.66502 4.42475 1.11273 4.42475C0.560447 4.42475 0.112732 4.87247 0.112732 5.42475V16.1915V16.1916V16.1916C0.112732 16.7439 0.560447 17.1916 1.11273 17.1916H17.8977C17.9297 17.1916 17.9613 17.1901 17.9925 17.1872C18.0235 17.1901 18.055 17.1915 18.0868 17.1915C18.639 17.1915 19.0868 16.7438 19.0868 16.1915V5.42476C19.0868 4.87247 18.639 4.42476 18.0868 4.42476C17.5345 4.42476 17.0868 4.87247 17.0868 5.42476V15.1916H2.11273V5.42475Z"/>
        </svg>
        <span>Скачать</span>
      </div>
      <div class="icon-like">
        <svg width="21" height="18" viewBox="0 0 21 18" fill="black" xmlns="http://www.w3.org/2000/svg">
          <mask id="path-1-inside-1_83_29" fill="white">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.21748 2.67974C0.200218 4.69701 0.0546293 7.92722 1.95719 10.053C2.86141 11.0633 3.81161 12.0939 4.61074 12.8923C5.86816 14.1486 7.54809 15.6289 8.83069 16.7276L9.15259 17.0495C9.54626 17.4432 10.0663 17.6406 10.5849 17.6332C11.1035 17.6406 11.6236 17.4432 12.0172 17.0495L12.3391 16.7276C13.6217 15.6289 15.3017 14.1486 16.5591 12.8923C17.3582 12.0939 18.3084 11.0633 19.2126 10.053C21.1152 7.92722 20.9696 4.69701 18.9524 2.67974L18.6288 2.35615C16.4809 0.20827 12.9985 0.20827 10.8506 2.35615L10.5849 2.62182L10.3192 2.35615C8.17136 0.20827 4.68896 0.20827 2.54107 2.35615L2.21748 2.67974Z"/>
          </mask>
          <path d="M1.95719 10.053L0.46689 11.3868L0.46689 11.3868L1.95719 10.053ZM2.21748 2.67974L3.6317 4.09396L2.21748 2.67974ZM4.61074 12.8923L6.0243 11.4775L6.0243 11.4775L4.61074 12.8923ZM8.83069 16.7276L10.2449 15.3134L10.1904 15.2589L10.1318 15.2087L8.83069 16.7276ZM9.15259 17.0495L10.5668 15.6353L10.5668 15.6353L9.15259 17.0495ZM10.5849 17.6332L10.6134 15.6334L10.5849 15.633L10.5564 15.6334L10.5849 17.6332ZM12.0172 17.0495L10.603 15.6353L10.603 15.6353L12.0172 17.0495ZM12.3391 16.7276L11.038 15.2087L10.9795 15.2589L10.9249 15.3134L12.3391 16.7276ZM16.5591 12.8923L15.1455 11.4775L15.1455 11.4775L16.5591 12.8923ZM19.2126 10.053L17.7223 8.71921L17.7223 8.71921L19.2126 10.053ZM18.9524 2.67974L20.3666 1.26553L20.3666 1.26553L18.9524 2.67974ZM18.6288 2.35615L17.2145 3.77037L17.2145 3.77037L18.6288 2.35615ZM10.8506 2.35615L9.43637 0.94194L9.43637 0.941942L10.8506 2.35615ZM10.5849 2.62182L9.1707 4.03604L10.5849 5.45025L11.9991 4.03604L10.5849 2.62182ZM10.3192 2.35615L8.90503 3.77037L8.90503 3.77037L10.3192 2.35615ZM2.54107 2.35615L3.95529 3.77037L3.95529 3.77037L2.54107 2.35615ZM3.44748 8.71921C2.27865 7.41323 2.33746 5.38819 3.6317 4.09396L0.80327 1.26553C-1.93702 4.00582 -2.16939 8.44121 0.46689 11.3868L3.44748 8.71921ZM6.0243 11.4775C5.26463 10.7185 4.34351 9.72037 3.44748 8.71921L0.46689 11.3868C1.37931 12.4063 2.35858 13.4694 3.19719 14.3072L6.0243 11.4775ZM10.1318 15.2087C8.85645 14.1162 7.22486 12.6769 6.0243 11.4775L3.19719 14.3072C4.51145 15.6202 6.23974 17.1416 7.52958 18.2465L10.1318 15.2087ZM7.41648 18.1418L7.73838 18.4637L10.5668 15.6353L10.2449 15.3134L7.41648 18.1418ZM7.73838 18.4637C8.52433 19.2497 9.56918 19.6479 10.6134 19.633L10.5564 15.6334C10.5599 15.6333 10.5625 15.6339 10.5648 15.6348C10.5661 15.6353 10.5672 15.636 10.568 15.6365C10.5688 15.637 10.5684 15.6369 10.5668 15.6353L7.73838 18.4637ZM10.603 15.6353C10.6014 15.6369 10.601 15.637 10.6019 15.6365C10.6026 15.636 10.6038 15.6353 10.6051 15.6348C10.6074 15.6339 10.6099 15.6333 10.6134 15.6334L10.5564 19.633C11.6007 19.6479 12.6455 19.2497 13.4315 18.4637L10.603 15.6353ZM10.9249 15.3134L10.603 15.6353L13.4315 18.4637L13.7534 18.1418L10.9249 15.3134ZM13.6403 18.2465C14.9301 17.1416 16.6584 15.6202 17.9726 14.3072L15.1455 11.4775C13.945 12.6769 12.3134 14.1162 11.038 15.2087L13.6403 18.2465ZM17.9726 14.3072C18.8113 13.4694 19.7905 12.4063 20.7029 11.3868L17.7223 8.71921C16.8263 9.72037 15.9052 10.7185 15.1455 11.4775L17.9726 14.3072ZM20.7029 11.3868C23.3392 8.44121 23.1069 4.00582 20.3666 1.26553L17.5381 4.09396C18.8324 5.38819 18.8912 7.41323 17.7223 8.71921L20.7029 11.3868ZM20.3666 1.26553L20.043 0.941939L17.2145 3.77037L17.5381 4.09396L20.3666 1.26553ZM20.043 0.94194C17.114 -1.98699 12.3653 -1.98699 9.43637 0.94194L12.2648 3.77037C13.6316 2.40353 15.8477 2.40353 17.2145 3.77037L20.043 0.94194ZM9.43637 0.941942L9.1707 1.20761L11.9991 4.03604L12.2648 3.77037L9.43637 0.941942ZM8.90503 3.77037L9.1707 4.03604L11.9991 1.20761L11.7335 0.941939L8.90503 3.77037ZM3.95529 3.77037C5.32212 2.40353 7.5382 2.40353 8.90503 3.77037L11.7335 0.94194C8.80453 -1.98699 4.05579 -1.98699 1.12686 0.94194L3.95529 3.77037ZM3.6317 4.09396L3.95529 3.77037L1.12686 0.94194L0.80327 1.26553L3.6317 4.09396Z" mask="url(#path-1-inside-1_83_29)"/>
        </svg>
        <span>15</span>
      </div>
    </div>
    <div class="description">
      <p>{{ data.description }}</p>
    </div>
    <div class="comment">
      <h2>Комментарии</h2>
      <div class="comments">
        <form class="comment-form">
          <textarea name="comment" placeholder="Отправить комментарий" rows="5"></textarea>
          <button>Отправить</button>
        </form>
        <div class="comment-user">
          <h4>Guest</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ducimus molestias tempore!</p>
          <span class="comment-date">25.03.23</span>
        </div>
        <div class="comment-user">
          <h4>Guest</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque laudantium non placeat quisquam quod soluta totam. Animi, assumenda blanditiis consequatur deserunt error esse harum iusto quaerat, quis reprehenderit similique sint tempora ullam vero vitae? Aliquam architecto, aut distinctio doloremque et, fugit ipsa iusto mollitia nostrum officiis omnis pariatur perspiciatis qui quod tenetur voluptas voluptatem. Ab animi asperiores at blanditiis, commodi delectus dolorum fuga hic illum iure magnam molestias officiis omnis perspiciatis quibusdam ut velit vitae. Architecto culpa debitis earum excepturi in laudantium magni recusandae rem veniam voluptate.</p>
          <span class="comment-date">25.03.23</span>
        </div>
        <div class="comment-user">
          <h4>Guest</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cum dicta earum harum illo in, iure laborum necessitatibus numquam quibusdam similique veniam vero voluptates? Atque consectetur iste itaque mollitia praesentium quibusdam quis temporibus?</p>
          <span class="comment-date">25.03.23</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'WorkView',
  data() {
    return {
      data: '',
    }
  },
  components: {
  },
  methods: {
    originImage() {
      window.open('http://localhost' + this.data.imageOrigin);
    }
  },
  mounted() {
    axios.get('http://localhost/project/' + this.$route.params.id).then(response => {
      this.data = response.data;
    })
  },
}
</script>

<style lang="scss">
.work {
  margin:  0 0 70px 0;
  .icon {
    display: flex;
    justify-content: space-between;
    margin: 10px 10px 0 10px;
    .icon-download {
      cursor: pointer;
      &>svg {
        width: 25px;
        height: 25px;
      }
    }
    &>div {
      display: flex;
      align-items: center;
      span {
        font-size: .8rem;
        margin-left: 5px;
      }
    }
    &>span {
      font-size: .8rem;
    }
  }
  .description {
    margin: 20px 10px 20px 10px;
    p {
      text-align: start;
    }
  }
  .comment {
    margin: 70px 10px 20px 10px;
    h2 {
      margin-bottom: 40px;
    }
    .comments {
      .comment-user {
        display: flex;
        flex-direction: column;
        text-align: start;
        margin-bottom: 25px;
        padding: 5px;
        border-radius: 4px;
        background-color: #fff;
        box-shadow: 2px 4px 15px -4px #000000;

        h4 {
          margin-bottom: 3px;
        }
        .comment-date {
          font-size: .8rem;
          text-align: end;
          margin-top: 15px;
        }
      }
    }
    .comment-form {
      margin: 40px 0 40px 0;
      display: flex;
      flex-direction: column;
      textarea {
        font-size: 1rem;
        max-width: 100%;
        padding: 5px;
        margin-bottom: 20px;
        border-radius: 4px;
        background-color: #fff;
        box-shadow: 2px 4px 15px -4px #000000;
        border: none;
        outline: none;
      }
      button {
        align-self: end;
        width: 200px;
        background-color: #2c3e50;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 10px;
      }
    }
  }
  img {
    width: 100%;
  }
}
@media (min-width: 851px) {
  .work {
    margin:  0 15px 70px 15px;
    .icon {
      &>div {
        span {
          font-size: .9rem;
        }
      }
    }
    .description {
      margin: 20px 0;
    }
  }
}
</style>