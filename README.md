# Portfolio 01

## テーマ情報

- **テーマ名**: Takumi Theme
- **バージョン**: 1.0
- **作成者**: Ryuya Kusaka
- **URL**: https://portfolio01.kusaka-web.site
- **ライセンス**: GPLv2 or later
- **必要なPHPバージョン**: 7.4以上
- **対応WordPressバージョン**: 6.7

## 主な機能

### カスタム投稿タイプ
- **実績紹介 (works)**: 建築実績を管理・表示するカスタム投稿タイプ
  - アーカイブページ対応
  - アイキャッチ画像対応
  - カスタムタクソノミー（実績カテゴリー）対応

### カスタムタクソノミー
- **実績カテゴリー (work_category)**: 実績をカテゴリーで分類
  - デフォルトカテゴリー: 商業施設、住宅、公共施設、リノベーション

### ナビゲーションメニュー
3つのメニュー位置を提供:
- **ヘッダーメニュー**: サイトヘッダー用のメインナビゲーション
- **ユーティリティメニュー**: ユーティリティリンク用
- **ドロワーメニュー**: モバイル用のドロワーメニュー

### ウィジェットエリア
2つのウィジェットエリアを提供:
- **サイドバー**: 通常の投稿・固定ページ用
- **実績紹介サイドバー**: 実績紹介ページ専用

### カスタムウィジェット
- **最新の実績紹介投稿**: カスタム投稿タイプ「works」の最新投稿を表示
- **実績カテゴリー一覧**: カスタムタクソノミー「work_category」の一覧を表示

## 使用ライブラリ

- **jQuery** 3.7.1: DOM操作
- **Swiper** 11.2.6: スライダー実装
- **GSAP** 3.12.7: アニメーション
- **ScrollTrigger**: スクロール連動アニメーション
- **FontAwesome** 5.8.2: アイコンフォント

## ディレクトリ構成

```
takumi/
├── assets/
│   ├── css/                    # コンパイル済みCSS
│   │   ├── common.css
│   │   └── style.css
│   ├── js/                     # JavaScriptファイル
│   │   ├── script.js           # メインスクリプト
│   │   └── swiper-init.js      # Swiper初期化
│   └── img/                    # 画像ファイル
├── inc/                        # 機能ファイル
│   ├── custom-post-types.php   # カスタム投稿タイプ
│   ├── custom-taxonomies.php   # カスタムタクソノミー
│   ├── breadcrumb.php          # パンくずリスト
│   ├── page-title.php          # ページタイトル
│   └── tags.php                # タグ関数
├── parts/                      # テンプレートパーツ
│   ├── breadcrumb.php
│   ├── drawer.php
│   ├── totop.php
│   ├── pagenation-*.php
│   └── content/
├── sass/                       # SCSS開発ファイル
│   ├── config/                 # 設定ファイル
│   ├── foundation/             # 基礎スタイル
│   ├── layout/                 # レイアウト
│   ├── components/             # コンポーネント
│   ├── pages/                  # ページ固有スタイル
│   ├── utilities/              # ユーティリティ
│   └── wordpress/              # WordPress固有スタイル
├── functions.php               # テーマ機能
├── header.php                  # ヘッダー
├── footer.php                  # フッター
├── front-page.php              # フロントページ
├── single.php                  # 個別投稿
├── single-works.php            # 実績詳細
├── archive.php                 # アーカイブ
├── archive-works.php           # 実績アーカイブ
├── page.php                    # 固定ページ
├── page-*.php                  # カスタム固定ページ
├── sidebar.php                 # サイドバー
├── sidebar-works.php           # 実績用サイドバー
├── 404.php                     # 404エラー
└── style.css                   # テーマ情報
```

## テンプレートファイル

| ファイル | 用途 |
|---------|------|
| `front-page.php` | トップページ |
| `header.php` | ヘッダー |
| `footer.php` | フッター |
| `single.php` | ブログ個別ページ |
| `single-works.php` | 実績詳細ページ |
| `archive.php` | ブログ一覧 |
| `archive-works.php` | 実績一覧 |
| `page.php` | 固定ページ |
| `page-company.php` | 会社概要 |
| `page-service.php` | 事業内容 |
| `page-recruit.php` | 採用情報 |
| `page-job1.php` | 求人詳細1 |
| `page-job2.php` | 求人詳細2 |
| `page-job3.php` | 求人詳細3 |
| `page-contact.php` | お問い合わせ |
| `page-privacy-policy.php` | プライバシーポリシー |
| `404.php` | 404エラー |
| `sidebar.php` | サイドバー |
| `sidebar-works.php` | 実績用サイドバー |