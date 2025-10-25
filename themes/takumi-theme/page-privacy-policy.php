<?php
  get_header();
?>

<div class="p-page-title">
  <img class="p-page-title__image" src="<?php echo my_page_title_image(); ?>" alt="Page Title Image">
  <div class="l-inner p-page-title__inner">
    <h1 class="p-page-title__heading">
      <span class="p-page-title__jp"><?php echo my_page_title_ja(); ?></span>
      <span class="p-page-title__en"><?php echo my_page_title_en(); ?></span>
    </h1>
  </div>
</div>

<?php
  get_template_part( 'parts/breadcrumb' );
?>

<div class="p-content">
  <div class="l-inner p-privacy-policy">

    <div class="c-section-subtitle js-fade-in">
      <h2 class="c-section-subtitle__txt">個人情報の利用目的</h2>
    </div>
    <p class="js-fade-in">
      当サイトでは、お問い合わせや記事へのコメントの際、名前やメールアドレス等の個人情報を入力いただく場合がございます。<br>
      取得した個人情報は、お問い合わせに対する回答や必要な情報を電子メールなどでご連絡する場合に利用させていただくものであり、これらの目的以外では利用いたしません。
    </p>

    <div class="c-section-subtitle js-fade-in">
      <h2 class="c-section-subtitle__txt">アクセス解析ツールについて</h2>
    </div>
    <p class="js-fade-in">
      当サイトでは、Googleによるアクセス解析ツール「Googleアナリティクス」を利用しています。このGoogleアナリティクスはトラフィックデータの収集のためにクッキー（Cookie）を使用しております。トラフィックデータは匿名で収集されており、個人を特定するものではありません。
    </p>

    <div class="c-section-subtitle js-fade-in">
      <h2 class="c-section-subtitle__txt">コメントについて</h2>
    </div>
    <p class="js-fade-in">
      当サイトへのコメントを残す際に、IP アドレスを収集しています。<br>
      これはサイトの標準機能としてサポートされている機能で、スパムや荒らしへの対応以外にこのIPアドレスを使用することはありません。<br>
      なお、全てのコメントは管理人が事前にその内容を確認し、承認した上での掲載となります。あらかじめご了承ください。
    </p>

    <div class="c-section-subtitle js-fade-in">
      <h2 class="c-section-subtitle__txt">著作権について</h2>
    </div>
    <p class="js-fade-in">
      当サイトで掲載している文章や画像などにつきましては、無断転載することを禁止します。<br>
      当サイトは著作権や肖像権の侵害を目的としたものではありません。著作権や肖像権に関して問題がございましたら、お問い合わせフォームよりご連絡ください。迅速に対応いたします。
    </p>

    <div class="c-section-subtitle js-fade-in">
      <h2 class="c-section-subtitle__txt">リンクについて</h2>
    </div>
    <p class="js-fade-in">
      当サイトは基本的にリンクフリーです。リンクを行う場合の許可や連絡は不要です。<br>
      ただし、インラインフレームの使用や画像の直リンクはご遠慮ください。
    </p>

    <div class="c-section-subtitle js-fade-in">
      <h2 class="c-section-subtitle__txt">免責事項</h2>
    </div>
    <p class="js-fade-in">
      当サイトからのリンクやバナーなどで移動したサイトで提供される情報、サービス等について一切の責任を負いません。<br>
      また当サイトのコンテンツ・情報について、できる限り正確な情報を提供するように努めておりますが、正確性や安全性を保証するものではありません。情報が古くなっていることもございます。<br>
      当サイトに掲載された内容によって生じた損害等の一切の責任を負いかねますのでご了承ください。
    </p>

    <div class="c-section-subtitle js-fade-in">
      <h2 class="c-section-subtitle__txt">プライバシーポリシー等の変更</h2>
    </div>
    <p class="js-fade-in">
      個人情報の変更、利用目的の変更、その他プライバシーポリシーの変更を行う際は、当ページへの変更をもって公表とさせていただきます。
    </p>

  </div>
</div>

<?php get_footer(); ?>