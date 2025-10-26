# Takumi Theme

建築設計事務所向けWordPressカスタムテーマ

## 基本情報

- **バージョン**: 1.0
- **作成者**: Ryuya Kusaka
- **ライセンス**: GPLv2 or later
- **PHP**: 7.4以上
- **WordPress**: 6.7以上

## 技術スタック

### フロントエンド
- jQuery 3.7.1
- Swiper 11.2.6
- GSAP 3.12.7 + ScrollTrigger
- FontAwesome 5.8.2

### 開発環境
- Node.js 18以上
- pnpm 8以上
- @wordpress/env (Docker)

## 主な機能

### カスタム投稿タイプ
- **works**: 実績紹介（アーカイブ、タクソノミー対応）

### ナビゲーションメニュー
- ヘッダーメニュー
- フッターメニュー
- ドロワーメニュー

### ウィジェット
- サイドバー（通常／実績専用）
- 最新実績投稿
- 実績カテゴリー一覧

### プラグイン
- Advanced Custom Fields Pro
- Contact Form 7
- All-in-One WP Migration

## セットアップ

### 1. 環境構築

```bash
# 依存パッケージインストール
pnpm install

# WordPress起動
pnpm start

# テーマ有効化
pnpm wp-env run cli wp theme activate takumi-theme
```

### 2. 自動セットアップ

```bash
pnpm setup:pages      # 固定ページ作成
pnpm setup:menus      # メニュー作成
pnpm setup:settings   # WordPress設定
```

**作成される固定ページ:**
- 会社概要、事業内容、採用情報
- 求人詳細×3
- お問い合わせ、プライバシーポリシー

**WordPress設定:**
- パーマリンク（投稿名）
- タイムゾーン（Asia/Tokyo）
- 日付・時刻フォーマット（日本語形式）

### 3. 言語設定（手動）

**管理画面 → 設定 → 一般**

1. Site Languageを「日本語」に変更
2. 保存

### 4. Contact Form 7（手動）

**管理画面 → お問い合わせ → 新規追加**

```html
<div class="c-form-group">
    <div class="c-form-label c-form-label__required">お名前</div>
    [text* your-name class:c-form-input placeholder "例）山田 太郎"]
</div>

<div class="c-form-group">
    <div class="c-form-label c-form-label__required">ふりがな</div>
    [text* your-kana class:c-form-input placeholder "例）やまだ たろう"]
</div>

<div class="c-form-group">
    <div class="c-form-label">会社名</div>
    [text your-company class:c-form-input placeholder "例）〇〇株式会社"]
</div>

<div class="c-form-group">
    <div class="c-form-label">ご住所</div>
    [text your-address class:c-form-input placeholder "例）〒000-0000 東京都〇〇区〇〇町1-2-3"]
</div>

<div class="c-form-group">
    <div class="c-form-label">電話番号</div>
    [tel your-phone class:c-form-input placeholder "例）000-0000-0000"]
</div>

<div class="c-form-group">
    <div class="c-form-label c-form-label__required">E-mail</div>
    [email* your-email class:c-form-input placeholder "例）abc@example.com"]
</div>

<div class="c-form-group">
    <div class="c-form-label c-form-label__required">お問合わせ内容</div>
    [textarea* your-message class:c-form-textarea placeholder "ご意見・ご要望などございましたら、お書きください。"]
</div>

<div class="c-form-submit">
    <div class="c-form-submit-wrap">
        [submit class:c-form-submit-btn "送信する"]
    </div>
</div>
```

保存後、ショートコードを「お問い合わせ」ページに追加。

### 5. ACFフィールド設定

**管理画面 → カスタムフィールド → フィールドグループ**

1. フィールドグループを作成・編集
2. 保存すると自動的に `acf-json/` にJSONファイルが生成される
3. JSONファイルをGitにコミット

**他の環境での同期:**
1. Gitからpull
2. 管理画面 → カスタムフィールド
3. 「同期可能」タブで「同期」をクリック

### 6. 完了確認

管理画面で以下を確認：
- 固定ページが8ページ作成されている
- メニューが3つ登録されている
- Site Languageが「日本語」になっている
- Contact Form 7のフォームが作成されている

## ディレクトリ構造

```
portfolio_01/
├── wordpress/
│   ├── themes/takumi-theme/
│   │   ├── assets/         # CSS, JS, 画像
│   │   ├── inc/            # 機能ファイル
│   │   ├── parts/          # テンプレートパーツ
│   │   ├── sass/           # SCSS
│   │   └── *.php           # テンプレート
│   └── plugins/
│       ├── advanced-custom-fields-pro/
│       ├── contact-form-7/
│       └── all-in-one-wp-migration/
├── setup/                  # セットアップスクリプト
├── .wp-env.json
└── package.json
```

## 便利なコマンド

```bash
pnpm start              # WordPress起動
pnpm stop               # WordPress停止
pnpm destroy            # 環境削除

pnpm setup:pages        # 固定ページ作成
pnpm setup:menus        # メニュー作成
pnpm setup:settings     # WordPress設定
pnpm reset              # データリセット

# WP-CLI実行
pnpm wp-env run cli wp <command>
```

## トラブルシューティング

### スクリプトエラー
```bash
# wp-env再起動
pnpm destroy && pnpm start
```

### 環境確認
```bash
pnpm wp-env status
pnpm wp-env run cli wp theme list
```

## 参考
- [WP-CLI](https://wp-cli.org/ja/)
- [@wordpress/env](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/)
