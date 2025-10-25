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
  <div class="l-inner">

    <div class="c-section-title p-recruit-section-title js-fade-in">
      <h2 class="c-section-title__jp">施工管理技士</h2>
      <p class="c-section-title__en">Recruit</p>
    </div>

    <div class="c-section-subtitle js-fade-in">
      <h3 class="c-section-subtitle__txt">募集要項</h3>
    </div>

    <dl class="c-table js-fade-in">
      <dt>職種</dt>
      <dd>施工管理士</dd>
      <dt>業務内容</dt>
      <dd>
        建築プロジェクトの施工管理（住宅・商業施設・公共建築など）<br>
        工程・品質・安全・コストの管理<br>
        クライアント・設計士・協力会社との打ち合わせ<br>
        施工図面の確認および修正指示<br>
        現場での施工状況のチェックおよび問題解決<br>
        建築資材の発注・管理
      </dd>
      <dt>応募資格</dt>
      <dd>
        【必須条件】
        <ul>
          <li>建築施工管理の実務経験（2年以上）</li>
          <li>建築施工管理技士（1級または2級）または同等の経験</li>
          <li>現場監督としての指示・調整能力</li>
          <li>建築基準法や安全管理に関する基礎知識</li>
        </ul>
        <br>
        【歓迎条件】
        <ul>
          <li>大規模建築（商業施設・オフィスビルなど）の施工管理経験</li>
          <li>AutoCAD、Revitを用いた施工図作成経験</li>
          <li>マネジメント経験がある方</li>
        </ul>
      </dd>
      <dt>雇用形態</dt>
      <dd>
        正社員（試用期間3ヶ月）<br>
        契約社員（希望に応じて）
      </dd>
      <dt>勤務地</dt>
      <dd>
        本社（東京）<br>
        各施工現場（関東圏中心）
      </dd>
      <dt>勤務時間</dt>
      <dd>
        8:00～17:00（休憩1時間）<br>
        現場により変動あり
      </dd>
      <dt>給与</dt>
      <dd>
        月給 350,000円～700,000円（経験・能力を考慮の上、決定）<br>
        賞与年2回<br>
        昇給制度あり
      </dd>
      <dt>福利厚生</dt>
      <dd>
        社会保険完備<br>
        交通費支給<br>
        資格取得支援制度<br>
        作業着・ヘルメット貸与<br>
        住宅手当（条件あり）
      </dd>
      <dt>休日</dt>
      <dd>
        週休2日制（日曜＋その他）<br>
        祝日<br>
        年末年始休暇<br>
        夏季休暇<br>
        有給休暇<br>
        慶弔休暇
      </dd>
    </dl>

    <div class="c-section-subtitle js-fade-in">
      <h3 class="c-section-subtitle__txt">募集方法</h3>
    </div>

    <div class="p-job-apply">
      <p class="p-job-comment js-fade-in">
        下記リンク先にある電話番号、またはお問い合わせフォームより当社にご連絡いただきますようお願いいたします。
      </p>
      <a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>" class="c-button p-job-button js-fade-in">応募はこちら</a>
    </div>

  </div>
</div>

<?php get_footer(); ?>