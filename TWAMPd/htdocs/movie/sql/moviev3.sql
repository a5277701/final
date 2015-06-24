-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `movie_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '電影編號',
  `movie_name` varchar(20) NOT NULL COMMENT '電影名稱',
  `movie_ENname` varchar(50) NOT NULL COMMENT '電影英文名稱',
  `movie_style` varchar(10) NOT NULL COMMENT '電影類型',
  `movie_level` enum('普遍級','保護級','輔導級','限制級') NOT NULL COMMENT '電影級別',
  `movie_length` time NOT NULL COMMENT '電影長度',
  `movie_releaseDate` date NOT NULL COMMENT '電影上映日期',
  `movie_introduction` longtext NOT NULL COMMENT '電影介紹',
  PRIMARY KEY (`movie_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='電影';

INSERT INTO `movie` (`movie_no`, `movie_name`, `movie_ENname`, `movie_style`, `movie_level`, `movie_length`, `movie_releaseDate`, `movie_introduction`) VALUES
(0001,	'麻辣賤諜',	'SPY',	'動作、喜劇',	'保護級',	'01:59:00',	'2015-05-27',	'一向行事低調、在中情局擔任分析師的蘇珊，是位專門執行危險任務卻不為人知的無名英雄，然而，她的搭檔在行動中因為不明原因消失無蹤，也連帶波及另一位頂尖中情局探員的安危。為了找出搭檔的下落，並且拯救這個岌岌可危的世界，她自願臥底，混進史上最危險的軍火商，企圖查出真相。'),
(0002,	'侏羅紀世界',	'Jurassic World',	'劇情、冒險',	'保護級',	'02:15:00',	'2015-06-10',	'你可以想像恐龍的長相、動作和叫聲，而不想到《侏羅紀公園》嗎？它不只是一部電影，更是我們所有人共同的記憶。它創造了暑假賣座鉅片的紀錄，讓經典畫面和聲效成為觀眾一生烙印在腦海中的觀影經驗。它讓你感受到暑假第一天的到來。它是視覺效果的先驅，讓你相信恐龍真的再次漫步於地球上。它結合了科技和令人屏息的想像力，警告你打亂自然秩序會導致什麼後果。它讓你目瞪口呆、驚嘆連連、心跳加速。《侏羅紀公園》讓你知道一部完美的暑假動作片可以放進多少故事、樂趣和驚奇。當初史蒂芬史匹柏執導的原創電影又回來了，實現諾言讓侏羅紀公園重生。\r\n\r\n歡迎蒞臨《侏羅紀世界》。22年前，約翰哈蒙德博士有個夢想：建立一座主題樂園，讓世界各地的遊客可以體驗親眼目睹真實恐龍的驚奇。現在他的夢想終於實現了。歡迎來到侏羅紀世界，這座設施完備的奢華渡假村可容納數萬名遊客，讓他們每天都能近距離接觸活生生的史前恐龍，感受無限驚奇與讚嘆。侏羅紀世界位於哥斯大黎加的離島，裡面建造了熙熙攘攘的主要大街，擁有讓人驚奇不斷的先進設施。小朋友可以在幼龍餵食區騎迷你三角龍；表演池中的滄龍從水中一躍而上，把吊得高高的的大白鯊一口咬下當點心，讓群眾發出陣陣歡呼；全家大小著迷的看著各式各樣的恐龍重新在大地上漫步，牠們都被關在安全的圍欄裡，讓遊客盡情觀賞。\r\n\r\n侏羅紀世界的大小事由企圖心旺盛的克萊兒（《姊妹》布萊絲達拉斯霍華 飾）掌管，有一天她的姊姊凱倫（《蟻人》茱蒂葛瑞兒 飾）將兩個兒子，16歲的柴克（影集《梅麗莎與喬伊》尼克羅賓森 飾）和11歲的格雷（《陰兒房》泰辛普金斯 飾），送到侏羅紀世界遊玩，也讓她和孩子們相聚幾天，但臨危受命的克萊兒卻忙到沒有時間，只好給他們票，讓他們去探索園區。侏羅紀世界的驚奇恐龍由吳亨利博士（《侏羅紀公園》BD Wong 飾）創造，身為基因學家的他，曾任職於哈蒙德第一座侏羅紀公園背後的國際基因公司，現在則是侏羅紀世界現任大老闆億萬富翁賽門瑪斯拉尼（《少年Pi的奇幻漂流》伊凡卡漢 飾）的員工。在商業考量之下，侏羅紀世界每年都要推出新賣點來吸引遊客不斷回流，因此吳博士挑戰科學倫理的底線，操弄基因並設計出新品種的基因改造恐龍，但沒有人知道牠到底有什麼能耐。吳博士發明出來的最高機密新品種為神祕巨大的帝王暴龍，牠還尚未對外開放參觀。牠吃掉了自己唯一的兄弟姊妹，獨自在籠子裡被養大。到底牠有哪些動物的基因是不能說的祕密。為了評估帝王暴龍以及圍欄的安全度，克萊兒去見了歐文（《星際異攻隊》克里斯普拉特 飾），他是退役軍人也是動物行為專家，在主園區的外圍研究基地進行隱密的工作。歐文多年來訓練了一批具侵略性的迅猛龍，和牠們建立起主從關係，勉勉強強讓牠們得以壓抑住掠食者的天性，不情願的聽從指示。野蠻和聰明程度都仍是未知數的帝王暴龍想出了逃脫方法，消失在叢林深處。侏羅紀世界裡的所有生物，包括人類和恐龍的性命都受到威脅。對克萊兒來說，她最擔心的就是兩名外甥的安全，他們當時坐在360度全景視野的水晶遊園車，還讓車子偏離路線。歐文和克萊兒動身去找兩個男孩，這時內部的命令讓園區陷入混亂，遊客成為恐龍獵物。恐龍們相繼逃出，在大地、空中和水裡使盡全力要活下來，整個園區已經沒有任何一個角落是安全的。\r\n\r\n《侏羅紀世界》由史蒂芬史匹柏欽點的導演柯林崔佛洛（《超時空徵友啟事》）執導，帶領傑出的幕後團隊一起打造這部規模浩大的電影。攝影是約翰施瓦茲曼（《奔騰年代》、《蜘蛛人：驚奇再起》）；美術設計是艾德瓦維拉（《X戰警：最後戰役》、《怪怪屋》）；剪接是凱文史蒂特（《X戰警》、《科洛弗檔案》）；服裝設計是丹尼爾奧蘭迪（《達文西密碼》、《大夢想家》）；配樂是曾獲奧斯卡獎肯定的麥可吉亞奇諾（《星際爭霸戰:闇黑無界》、《猩球崛起：黎明的進擊》）。這部史詩動作探險鉅片由五度獲得奧斯卡獎提名的法蘭克馬歇爾（《侏羅紀公園》、《回到未來》三部曲、《印地安納瓊斯》系列和《神鬼認證》系列）和派翠克科羅利（《神鬼認證》系列、《極地長征》）、擔任製片；根據麥可克萊頓（《侏羅紀公園》系列、影集《急診室的春天》）原作改編；故事撰寫為瑞克賈法與亞曼達席佛（《猩球崛起》）；劇本撰寫為瑞克賈法、亞曼達席佛、德瑞克康納（《超時空徵友啟事）與柯林崔佛洛。監製為史蒂芬史匹柏與湯瑪斯塔爾（《哥吉拉》、即將上映之《魔獸世界》）。'),
(0003,	'復仇者聯盟2：奧創紀元',	'Avengers: Age of Ultron',	'動作、劇情',	'保護級',	'02:22:00',	'2014-04-22',	'在《復仇者聯盟2：奧創紀元》中，卸下鋼鐵衣的東尼史塔克為了保護世界，發明了「奧創」一個有自我意識、學習能力的人工智能機器人，並將指揮機器人軍團的大權交給奧創。然後不斷進化的奧創得出了「人類是地球上最大威脅」的結論，進而開始實施清除人類的毀滅計畫，擁有強大能力的新角色緋紅女巫以及快銀也將加入戰局。復仇者聯盟必須再度集合，解決這個由他們親手造成的全球危機！'),
(0004,	'明日世界',	'Tomorrowland',	'動作、冒險',	'保護級',	'02:10:00',	'2014-05-22',	'二十世紀初，愛迪生、巴黎鐵塔設計師艾菲爾、交流電之父特斯拉和其他頂尖的科學家、藝術家們組成了一個祕密團體，共同打造一個理想計畫—「明日世界」，可是這個計劃卻出了意外，「明日世界」也從此消失。\r\n\r\n法蘭克少年時曾親眼目睹「明日世界」，但意外之後便過著半隱居的生活，直到聰明的少女凱西找上門，凱西對科學和生命都充滿熱情，在無意間發現了神秘的通關暗號，她需要法蘭克的協助，破解零星線索，找到隱藏在神秘時空裡的「明日世界」，以改變人類的命運。\r\n\r\n曾執導《不可能的任務：鬼影行動》與《超人特攻隊》的奧斯卡贏家布萊德博特，聯手金獎影帝喬治庫隆尼，超強陣容要讓觀眾體驗前所未有的冒險旅程。'),
(0005,	'瘋狂麥斯：憤怒道',	'Mad Max: Fury Road',	'劇情、動作、冒險',	'輔導級',	'02:00:00',	'2015-05-15',	'1979年梅爾吉勃遜成名作《衝鋒飛車隊》經典重拍，邀得湯姆哈迪、莎莉賽隆領銜主演。'),
(0006,	'要聽神明的話',	'As the Gods Will',	'懸疑/驚悚',	'輔導級',	'01:57:00',	'2015-05-15',	'★暢銷漫畫改編\r\n★惡之教典導演最新力作\r\n\r\n《聽神明的話》改編自金城一紀原作，藤村緋二作畫的暢銷漫畫《要聽神明的話》，描述福士飾演的平凡高中生高畑瞬某天在上課時，教室裡突然出現神秘不倒翁把老師殺害，緊接著全體學生都被迫參加輸了就會死亡的大逃殺遊戲。'),
(0007,	'玩命關頭7',	'Fast & Furious 7',	'動作',	'輔導級',	'02:18:00',	'2015-04-01',	'我沒有朋友，我只有家人\r\n\r\n這句話是《玩命關頭》系列的縮影，可以套用到出生入死的劇中團隊，還有陣容堅強的劇組人員，大家前後合作了七部電影，感情不亞於任何血緣關係。《玩命關頭》15年前開拍，任誰都沒想到洛杉磯起家的街頭車手傳說，會變成全球最流行、最不敗的動作續集電影。 《玩命關頭7》這次七度狂飆，堪稱是特技最強、場面最大、抱負最高的一集。對於《玩命關頭》大家庭的一員來說，無論是幕前幕後的工作人員，或是大螢幕前的熱情粉絲，《玩命關頭7》都是獨一無二。 \r\n2000年《玩命關頭》只是小成本電影，當時那些演員尚不成氣候，但逐漸嶄露頭角。這部動作冒險鉅片的靈感，來自於Vibe雜誌關於街頭賽車俱樂部的報導。《玩命關頭》敘述洛杉磯東部一個非法賽車團體的英雄事跡，這群人玩起渦輪增壓賽車沒在怕的，他們遊走法律邊緣的玩命飆車人生，讓《玩命關頭》成為2001年暑假票房黑馬，全球賺進2.07億美元。每一集《玩命關頭》都比前一集吸引到更多觀眾，更成功燃起死忠影迷的熱情，創下24億美元的票房佳績，這是環球影業最賣座的原創續集電影，不僅帶來最多的利潤，也樹立不敗的電影主題。在社群網站吸睛能力更是驚人，電影和演員粉絲專頁的追蹤人數，超越任何動作續集電影。\r\n\r\n《玩命關頭》以家庭為核心，榮登經典動作電影寶座，其冒險旅程和情感深度總是超越觀眾的期待，玩命團隊的足跡遍佈世界各地，包括日本、墨西哥、多明尼加共和國、巴西、加納利群島和英國，完成幾乎不可能的任務。在《玩命關頭7》，玩命團隊再度啟程，來個最後的終極狂飆，動作冒險和情感釋放都將超越以往。馮迪索、保羅沃克、巨石強森、蜜雪兒羅卓奎茲、泰瑞斯吉布森、路達克里斯和喬丹娜布魯斯特，原班人馬再度重返玩命團隊，就連深獲影迷喜愛的艾兒莎巴塔奇和盧卡斯布萊克也來助陣。新一集更找來傑森史塔森、寇特羅素、娜塔莉艾曼紐、吉蒙哈蘇、龍達魯西和東尼嘉。\r\n\r\n《玩命關頭7》的故事發生在唐老大（馮迪索 飾）和布萊恩（保羅沃克 飾）重獲自由一年多後，他們擺脫暗無天日的亡命生活，卻發現這個家脫離現實。唐老大忙著和莉蒂（蜜雪兒羅卓奎茲 飾）重新培養感情，布萊恩則努力跟蜜雅（喬丹娜布魯斯特 飾）和兒子適應郊區生活，泰吉（路達克里斯 飾）和羅曼（泰瑞斯喬布森）倒是實現花花公子的夢想，大肆慶祝得來不易的自由。可怕的是，他們都沒發現危機伺伏。英國特種部隊殺手戴克蕭（傑森史塔森 飾），正準備為弟弟歐文蕭（路克伊凡斯 飾）報仇。東京的韓哥（姜成 飾）先遭到謀殺，洛杉磯的哈柏（巨石強森 飾）緊接遭暗算。戴克蕭炸了唐老大的家。那個家是玩命團隊重獲自由後，全家人所重返的避風港。唐老大只好請求美國特種部隊（寇特羅素 飾）的協助。這些英雄們打算重操舊業，為美國政府奪回聰明的追蹤裝置，此裝置可以幫他們找到戴克蕭的下落，以免家人再度遭到毒手。玩命團隊再度出擊，有唐老大、布萊恩、哈柏、莉蒂、羅曼、泰吉和蜜雅，他們在《玩命關頭7》面臨前所未見的威脅，並遠征阿布達比和亞塞拜然，當然還有他們最熟悉不過的戰場—洛杉磯的街頭。\r\n\r\n《玩命關頭7》加入新導演溫子仁（《厲陰宅》、《陰兒房》）。此外還有製片尼爾摩里茲（《玩命關頭》、《我是傳奇》、《降魔戰警》）、馮迪索（《玩命關頭5》、《玩命關頭》、《狂野時速4》）和麥可福特萊爾（《玩命關頭5》、《終極警探4.0》）。克里斯摩根（《玩命關頭5》、《玩命關頭：東京甩尾》、《刺客聯盟》、《浪人47》)身兼執行製片與編劇，原始角色是由蓋瑞史考特湯普森創造出來的（《玩命關頭》）。執行製片為雅曼達露意絲（《玩命關頭5》、《玩命關頭6》）、 薩曼莎文森特 (《玩命關頭5》、《玩命關頭6》)。我們還要感謝原班幕後團隊，例如攝影師史帝芬溫頓(《玩命關頭5》、《玩命關頭6》)、服裝設計桑佳米爾科維奇黑斯（《玩命關頭》系列、《神鬼傳奇3》）、 車輛統籌丹尼斯麥卡錫（《玩命關頭5》、《玩命關頭6》）、第二拍攝小組的導演史派羅拉薩圖（《玩命關頭6》、《美國隊長：酷寒戰士》）和編曲布萊恩泰勒（《玩命關頭5》、《玩命關頭6》）。此外，也加入新血美術設計比爾布爾澤斯基（《鋼鐵人3》、《醉後大丈夫2》）等人。\r\n\r\n最後的極速狂飆：緣起\r\n\r\n《玩命關頭6》殺青後，導演林詣彬揮別了四度合作的《玩命關頭》系列。製片尼爾摩里茲和馮迪索，還有編劇克里斯摩根三人，開始敲定新的導演人選。這個人必須中途加入，監督這部大製作、大名氣和擁有廣大粉絲的系列電影，故事、角色和動作場面都要超越以往，以免熱情粉絲希望落空。澳洲導演溫子仁捧紅不少懸疑片，拍出《奪魂鋸》、《陰兒房》、《厲陰房》等賣座電影，毅然決然接下《玩命關頭7》的導演工作。《玩命關頭》的賣點不外乎強大的角色、源源不絕的創意、充滿戲劇張力的視覺震撼，溫子仁相信自己可以勝任，讓故事情節和動作場面再創高峰。溫子仁急欲參與《玩命關頭7》如此備受關注的電影：「我是《玩命關頭》的粉絲，很開心有機會突破我的戲路，拍攝深受全球影迷喜愛的電影。我對《玩命關頭7》的期許，就是突破自我的極限，拍出不一樣的東西。如此眾望所歸的大片，任誰都無法抗拒」。《玩命關頭5》透露出莉蒂還活著的蛛絲馬跡，廣大影迷恨不得《玩命關頭6》立刻上映，《玩命關頭》系列進而導向意外的劇情發展，結果不失所望。《玩命關頭6》的片尾，不僅確定第七集的走向，也解決大家最常見的疑問：《玩命關頭：東京甩尾》和姜成所飾演的韓哥，在整個系列的定位為何？經過製片巧妙的暗示，《玩命關頭：東京甩尾》並不是番外篇，道盡了唐老大和韓哥的兄弟情誼，巧妙地融入《玩命關頭》的故事軸線。\r\n\r\n《玩命關頭6》更曝光了前所未見的車手，由動作巨星傑森史塔森飾演，他開著賓士撞飛韓哥的車子。《玩命關頭6》對過去有了交代，更帶出新的故事軸線。這就是《玩命關頭》賣座十多年的原因，故事點和動作場面堪稱爽片的極致，影迷說什麼也要支持到底。馮迪索很重視那些相挺到底的粉絲，大家共同守護了七部電影：「觀眾願意讓我們一部接著一部拍，願意跟隨我們極速狂飆，完全是看在我們的成果。10年來精心策劃的《玩命關頭》系列，沒有天外飛來一筆，一切都會在《玩命關頭7》殊途同歸。影迷的疑問解決了，新故事線出來了。如果這是生命，就像等待發芽的種子。」克里斯摩根長年擔任《玩命關頭》的編劇和執行製片，這是他的五度狂飆。他不斷更新自己的多色便利貼筆記，上面記載著過去的角色、車子和故事點，有時候需要回溯到前面幾集，例如唐老大重要的護身符，那一條十字架項鍊。\r\n\r\n克里斯摩根說：「一景一物都有意義，這在向《玩命關頭》系列致敬，向支持我們的影迷致敬。」最好的例子就是莉蒂回到唐老大身邊，這對莉蒂來說是難以克服的關卡，她必須拼湊自己的過去，找回自己的情感歸屬…她才有機會跟靈魂伴侶分享未來。饒富興味的故事線，加上備受喜愛的角色，只是《玩命關頭》的一部分賣點。演員和劇組人員更在社群網站，跟死忠粉絲保持密切互動，建立了長達多年的對話管道和深厚關係。多虧了社群網站的互動性，《玩命關頭》每一集的票房屢創新高。《玩命關頭》的觀眾有一個特色：不只關注劇情，也好奇下一次的拍攝地點和車款。馮迪索密切關注《玩命關頭》網頁上的意見，他詢問粉絲最想看到誰重返玩命團隊，結果發現大家對於莉蒂的死哀號遍野。為了報答粉絲的熱情相挺，他也會提供第一手的《玩命關頭》新聞。身兼演員和製片的馮迪索，可說是導演溫子仁的良師益友，溫子仁表示：「在拍攝期間，馮迪索是我的重要夥伴，有了他的協助，我的導演工作更加得心應手。我們很早就開始討論劇中角色和整個系列，包括《玩命關頭》的過去和未來。我們感情很好，大家拍起戲來事半功倍。他很清楚怎麼詮釋唐老大，但依然虛心接受我的導演。真的很感謝他！」'),
(0008,	'加州大地震',	'SAN ANDREAS',	'冒險、動作、劇情',	'保護級',	'01:55:00',	'2015-05-29',	'聲名狼藉的聖安德列斯斷層（San Andreas Fault）終於崩塌之後，在加州引發了9級的大地震。負責搜尋救援的直昇機駕駛員（巨石強森 飾）與他失和的妻子決定從洛衫磯往北飛向舊金山，一同搶救他們的獨生女。 \r\n\r\n然而，當他們以為早已度過最糟的情況時，危機四伏的驚險旅程其實才正要開始。\r\n\r\n巨石強森與導演布萊德派頓和製片布佛林繼全球賣座片《地心冒險2：神祕島》之後，再度合作的最新動作冒險片《加州大地震》。	這部電影的其他卡司包括卡拉裘吉諾（《博物館驚魂夜》、影集《我家也有大明星》）、亞歷珊卓妲妲里奧（《波西傑克森：妖魔之海》、影集《真探》）、伊恩葛魯佛（《驚奇4超人：銀色衝浪手現身》）、雅奇潘嘉比（影集《傲骨賢妻》）、雨果強斯頓柏特（澳洲影集《Home and Away》）、亞特柏金森（影集《冰與火之歌：權力遊戲》）及奧斯卡獎提名男星保羅賈麥提（《最後一擊》）。製片是布佛林（《海克力士》、《地心冒險2：神祕島》）和崔普文森（《紅潮入侵》）；監製是李察布瑞納、山繆布朗、麥可迪斯可、勞勃寇文、史蒂芬穆欽和布魯斯柏曼；聯合製片是希蘭賈西亞。編劇是卡爾頓庫斯。故事原創是安德魯法比席歐和傑瑞米帕斯摩爾。幕後創意團隊包括攝影指導史提夫葉德林（《迴路殺手》）、製作設計巴瑞庫西德（《明天過後》）、剪輯鮑伯杜卡西（《哥吉拉》）、視效製作人蘭道史達爾（《直闖暴風圈》）、視效監督柯林史特勞斯（《復仇者聯盟》）及服裝設計溫蒂查克（《暮光之城：無懼的愛》）。 \r\n\r\n全片在澳洲昆士蘭的黃金海岸和布利斯班，以及洛衫磯和舊金山實景拍攝以2D與3D方式呈現。\r\n《加州大地震》由新線影業聯合Village Roadshow影業出品，FlynnPictureCo.公司製作，華納影業發行，特定地區由Village Roadshow發行。預計2015年6月5日起上映。'),
(0009,	'叫魂',	'Demonic',	'懸疑/驚悚、恐怖',	'輔導級',	'01:23:00',	'2015-05-29',	'★《陰兒房》、《厲陰宅》恐怖鬼才溫子仁最新力作\r\n★好友一同「召魂」，卻不料請鬼容易送鬼難\r\n★當你自拍時，別忘了「他們」也想被看見…\r\n★超越《忐忑》、《驚字塔》的空間顫慄\r\n\r\n小鎮上，五個好友一同慘死在一間空屋內，唯一的生還者聲稱，是這房子殺了她們，幾年後，這位發了瘋的生還者亦不幸病死…2014年，六個好友為做實驗來凶宅「召魂」，透過並透過自拍攝影記錄下一切，沒想到竟然請鬼容易送鬼難…接二連三發生的驚悚事件，讓好友們一個個被詭異虐殺，唯一的「生還者」，得向警方解釋這一切，並透過拍攝的影片找到兇手，只是這些透過「牽魂陣」被召來的魂，除了想要被看見，似乎更想要找人陪…\r\n\r\n召喚「邪靈」　就是毀滅的開始\r\n人們對未知的靈異現象與形體總是有著想一探究竟的好奇心，以致於召魂儀式時有所聞，坊間也有許多人對於邪惡神秘力量產生崇拜，進而走火入魔。幾位好友來到傳說中的凶宅想與找尋鬼魂的真相，沒想到請鬼容易送鬼難，邪惡猛鬼的力量遠大於他們所能想像。\r\n\r\n【關於影片】\r\n\r\n◆拍攝緣起\r\n《叫魂》為恐怖片鬼才導演溫子仁的最新作品，一部探討因召魂、邪靈附身導致抓交替及虐殺等令人意想不到後果的故事，溫子仁不同於以往的作品，《叫魂》驚悚的劇情加上強烈的音效搭配與節奏掌握，超越了《陰兒房》（Incidious,　2011）、《厲嬰宅》（The Conjuring）的鬼魅氣氛與空間顫慄。此外，《叫魂》故事中的精彩轉折，與意想不到的劇情走向，亦讓本片在恐怖驚悚之餘更多了分懸疑。\r\n\r\n◆關於「召魂」\r\n在史料的記載中，召魂儀式起源非常早。死者親屬要從前方升屋去召魂，手拿死者的衣服面北呼叫，如果死者是男的，就呼名呼字，連呼三聲，以期望死者的魂魄返回於衣，這件「衣服」被人所穿著，染上了人的肌膚香澤，有著肉體和氣息的雙重聯繫；魂魄也許會被它所吸引，依著熟悉的味道或形狀而歸附回來。\r\n\r\n◆關於「附身」\r\n「附身」，是一個超自然概念，意指活人的軀體被超自然靈體（如惡魔、神、先人的靈魂等）暫時性操控，因此表現出一些與平日相異的行為。附身的概念可見於許多宗教、神話及民間傳說中，如靈媒、乩童；當靈體被認為是邪惡的時候，就是俗稱「鬼上身」。被附身之人會表現出精神失常有如精神病患者，自言自語，眼目兇狠，折磨自己，傷害他人等反常行為。\r\n\r\n◆關於「牽魂陣」\r\n在宗教尚未出現時，人們崇尚自然崇拜，不僅對於大自然力量深感畏懼，進而衍生出許多代表著天地萬物不同的符號與陣法，而人們更是相信透過符號的神秘力量能讓兩個不同世界（陽界與陰界）相連與溝通。其中「牽魂陣」就是古時候異教徒與惡魔溝通開啟陰陽兩界之門的陣法，透過陣法開啟結界，讓陰陽兩界的人能溝通，但是後果也可能因為邪靈的強大力量讓人們跌入萬劫不復的深淵。'),
(0010,	'陰兒房第３章：從靈開始',	'Insidious 3',	'恐怖、懸疑/驚悚',	'輔導級',	'01:37:00',	'2015-06-05',	'本集的導演由溫子仁長期編劇夥伴雷沃納爾親自操刀，雷過去曾擔任奪魂鋸及陰兒房系列電影編劇。前２集創下全美票房佳績的續集電影，這一集將故事拉到恐怖的源頭，早在蘭柏特一家鬧鬼之前，一切的神祕鬼怪開始於一個青少女及她的家庭…'),
(0011,	'忍者龜：變種世代',	'Teenage Mutant Ninja Turtles',	'喜劇、冒險',	'保護級',	'01:41:00',	'2014-08-08',	'犯罪、暴力及恐懼，已經失控，新的英雄即將崛起。\r\n\r\n在曼哈頓的下水道住著四隻接受嚴格訓練的忍者龜，分別是達文西、拉斐爾、米開朗基羅和多納太羅以及他們的師父史林特，將聯手對抗邪惡勢力。'),
(0012,	'直闖暴風圈',	'Into the Storm',	'劇情',	'保護級',	'01:29:00',	'2014-08-08',	'最新龍捲風災難電影《直闖暴風圈》由史蒂夫奎爾（《絕命終結站5》）執導，陶德嘉納（《全民情獸》、《騎士出任務》）製作。\r\n\r\n在一天之內，席維頓鎮遭受到出乎意料的龍捲風襲擊，到處變得滿目瘡痍，全鎮受到這些難以捉摸又致命的旋風擺佈，甚至氣象預測中心預言最壞的情況尚未來臨。多數人尋求避難，有些人反而奔向災區，想利用這千載難逢的機會，測試風暴追蹤器的能耐。\r\n\r\n這部電影透過專業的龍捲風探索家、追求刺激的業餘人士和英勇的鎮民之目光和鏡頭述說，會讓你彷彿身歷實境，落入暴風眼中，體驗大自然的極端威力。'),
(0013,	'星際異攻隊',	'Guardians of the Galaxy',	'動作、冒險',	'保護級',	'02:00:00',	'2014-07-31',	'電影《星際異攻隊》（Guardians of the Galaxy）的故事敘述一群來自銀河系不同星球，各自身懷絕技的不法之徒，聚在一起抵禦宇宙強敵入侵的故事。他們由地球人星爵招募，成員包括銀河系最危險的女殺手葛摩菈、毀滅者德雷克斯、樹人葛魯特，以及槍法一流百步穿楊的火箭浣熊。這群看似吊兒郎當、漫不經心的團隊，將要面對宇宙惡勢力的入侵，他們能夠出奇制勝，扭轉情勢嗎? 《星際異攻隊》將帶給您漫威電影世界的嶄新面貌!'),
(0014,	'小小兵',	'Minions',	'動畫、喜劇',	'普遍級',	'01:40:00',	'2015-07-10',	'由環球影業以及Illumination娛樂公司出品的《小小兵》故事起源於盤古開天時期，剛開始只是一個黃色的有機體，隨著時間漸漸演化成小小兵團，他們的存在目的就是要服侍當代最兇惡的主人，然而從T. Rex 恐龍，埃及法老王，拿破崙甚至是德古拉，小小兵總是不停的失敗了-到最後小小兵們發現已經沒有可以服侍的主人，從此開始鬱鬱寡歡，甚至逐漸凋零。這時其中的一隻小小兵—凱文他有個偉大的計畫，就是帶著他的麻吉—大胃王史都華還有膽小的蘿蔔，挺身而出踏上尋找新主人的冒險旅程…\r\n\r\n《小小兵》電影配樂精心搭配60年代傳唱至今的暢銷金曲，並且由Illumination娛樂公司的克里斯梅勒丹德利、珍娜海莉製作，皮耶考芬和凱爾巴爾達執導，布萊恩林區編劇和克里斯雷納德擔任執行製片。'),
(0015,	'馴龍高手2',	'How to Train Your Dragon 2',	'動畫、劇情',	'普遍級',	'01:40:00',	'2014-07-04',	'本片為《馴龍高手》續集，由原導演迪恩德布洛斯獨自執導，克里斯桑德斯擔任執行製片人，所有台前配音及幕後原班人馬將全數回歸，新加入的影后凱特布蘭琪則將擔綱要角。\r\n\r\n經歷了五年，主角小嗝嗝已蛻變成帥氣的男人，與恐龍沒牙培養出超好默契。他們成功讓維京人與龍和平共存於博克島，而當夥伴亞絲翠、鼻涕粗等，正沉浸於島上飛龍奪羊的競賽時，兩人決定前往別處冒險，尋找尚未被發掘的領土。\r\n\r\n小嗝嗝和沒牙意外發現了新的龍族領土─數百種新野生龍族和神祕龍騎士居住的神秘冰洞。各式各樣的龍出現在他們面前，超可愛的龍寶寶也到處玩耍著，但最驚喜的發現就是：小嗝嗝找到了他失散多年的母親（凱特布蘭琪 配音），沒想到她才是真正的馴龍始祖！\r\n\r\n透過母親的帶領，小嗝嗝見識到更多的龍以及馴龍的秘技，一家人也得以團圓。但處於保護和平的戰爭中心，小嗝嗝和沒牙也面臨龍族的挑戰，片中大反派將現身奪走所有的龍，小嗝嗝和博克島的族人們將挺身面對這場戰役。'),
(0016,	'露西',	'Lucy',	'動作、劇情',	'輔導級',	'01:29:00',	'2014-08-20',	'盧貝松編導，集合了史嘉蕾喬韓森和摩根費里曼等卡司的動作片，並於2013年十月間來台北取景拍攝。片中有不少台灣演員亮相，包括計程車司機邢峰、飯店門房李淳、扮演櫃檯人員的阿Ken台詞最多且中英語雙聲演出，女星林辰唏也客串電視主播。 \r\n\r\n露西（史嘉蕾喬韓森飾演）是一個25歲的美國女子，住在臺北，被迫幫韓國黑幫老大運毒，她的身體被當成運毒容器，無意間吸收了寶貴的合成藥物CPH4，致使獲得越來越強大的和增強的生理和心理能力，心電感應，隔空取物，心理時間旅行，而她可以選擇不感到疼痛或其他不適。露西前往附近的醫院得到的從她的腹部取出毒品的袋子。袋子被成功取出，通過藥物的揮發性質的操作醫生，傳感她成長的身心能力，後來露西返回張成澤的酒店，襲擊了他和他的保鏢，和傳心術提取從他的腦海三種藥物騾子的位置。 \r\n\r\n在她的公寓，露西開始研究她的病情和聯繫一家知名的科學家和醫生，塞繆爾·諾曼教授（摩根費里曼飾演），他的研究可能是為了挽救她的關鍵。之後露西提供她開發能力的證明，她飛往巴黎，需要當地的警察隊長，皮埃爾·里奧幫助，在飛機上，她的細胞開始瓦解，而無需耗費更多的CPH4。她的力量不斷壯大，讓她能夠心靈感應癱瘓武警和成員來自韓國的販毒團，並趕緊找諾曼教授，與她同意分享一切，她現在才知道，後生活的主要重點是傳授知識。老大和暴徒還要奪走藥物和槍戰隨之而來的法國警察。 \r\n\r\n本片以法國與台灣作為主場景，片長89分鐘裡出現長達50分鐘的台灣街景，影片一開頭就出現中華民國國旗，之後包括台北101為主視覺的台北市日夜景、中山北路的晶華酒店、八德路的台北機廠、迪化街永樂市場到滿街機車、公車、文湖線公車等台北城市面貌，以及盧貝松愛吃的小籠包大特寫，都讓台北能見度提昇。'),
(0017,	'熊麻吉2',	'Ted 2',	'喜劇',	'限制級',	'01:50:00',	'2015-06-26',	'2012年票房大黑馬《熊麻吉》打破全台影史限制級喜劇類開片票房最高記錄，全台票房高達二億四千三百萬新台幣，一隻史上最賤，反差極大且有練過的18禁熊熊，個性超high，擅長把妹、開趴、哈草和熊抱成功擄獲全球觀眾的心。\r\n\r\n2015年《熊麻吉2》來勢熊熊準備再創高潮，同樣由塞思麥克法蘭自編自導自演，主要演員馬克華伯格、亞曼達席菲德、連恩尼遜、摩根費里曼和潔西卡芭絲…等。想要知道《熊麻吉2》這一集會發生什麼勁爆的事情，敬請耐心期待！'),
(0018,	'愛琳娜',	'Elena',	'劇情',	'保護級',	'02:18:00',	'2015-06-05',	'主角陳愛琳，名字從「女兒是爸爸前世的愛人」而來。35歲的她出身底層家庭，因緣際會學會小提琴，於是奮力向上，立志嫁到好人家，不僅希望找到愛情，還想望從此階級翻身，讓一家人雞犬升天。但是翻身夢碎，她在重挫的谷底體會到，找到自己的價值，才是最珍貴的財富。於是，她以琴身為盾、弓為劍，化身蒙面小提琴女俠，出沒在都市各個角落快閃演出，證明自己的價值，同時為弱勢民眾讚聲。她的現代蒙面女俠的身分迅速引起注目，台灣女蘇洛成為媒體寵兒。她自己創造出生命的轉捩點，要為自己、家人、同屬弱勢階級的人們的幸福，扳回一城。'),
(0019,	'我的殭屍女兒',	'Maggie',	'恐怖',	'輔導級',	'01:35:00',	'2015-05-29',	'一種致命的末日殭屍病毒，在美國中西部蔓延開來，只要被咬到一口，病毒就會使全身細胞崩壞，成為吃人的活死屍。民眾死命逃離感染疫區，原本人口密集的市鎮，頓時變成荒涼鬼域，奇怪的是，僅有一對父女，不肯離去…'),
(0020,	'巡弋狙擊手',	'GOOD KILL',	'驚悚',	'輔導級',	'01:43:00',	'2015-06-05',	'911恐怖攻擊過後，美國對阿富汗的塔利班政權展開長期抗戰。空軍少校湯米（伊森霍克飾演）原是在中東戰區駕駛F-16戰鬥機的飛行員，之後轉任無人戰鬥機駕駛，只需坐在拉斯維加斯的總部房間，動動手指就可遠端遙控塔利班戰事的進展。不過螢幕上一幕幕殺戮畫面，以及渴望重返飛行的心情，都讓湯米的內心無法再繼續保持冷靜…。\r\n\r\n他每天工作12小時，然後回到家與妻小共度剩餘的12小時，平靜生活讓他的工作竟像一場電動遊戲。這讓湯米不禁捫心自問，這些任務的意義究竟何在？他所製造出來的恐怖份子，是否比他所殺害的人還要多更多？而這場戰爭，是否永遠沒有結束的一天？當他與組員必須為美國中央情報局CIA執行更具道德爭議的任務時，湯米和戰友的內心陷入嚴重天人交戰；同時，他跟妻子美滿的婚姻關係，也逐漸產生裂痕…\r\n');

DROP TABLE IF EXISTS `movie_hall`;
CREATE TABLE `movie_hall` (
  `hall_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '影廳編號',
  `theater_no` int(4) unsigned zerofill NOT NULL COMMENT '戲院名稱',
  `hall_name` varchar(6) NOT NULL COMMENT '影廳名稱',
  PRIMARY KEY (`hall_no`),
  UNIQUE KEY `theater_no_hall_name` (`theater_no`,`hall_name`),
  CONSTRAINT `movie_hall_ibfk_1` FOREIGN KEY (`theater_no`) REFERENCES `movie_theater` (`theater_no`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='影廳';

INSERT INTO `movie_hall` (`hall_no`, `theater_no`, `hall_name`) VALUES
(0001,	0001,	'A廳'),
(0002,	0001,	'B廳'),
(0003,	0002,	'1廳'),
(0004,	0002,	'2廳'),
(0005,	0003,	'金廳'),
(0006,	0003,	'銀廳'),
(0007,	0004,	'紅廳'),
(0008,	0004,	'藍廳'),
(0009,	0005,	'A廳'),
(0010,	0005,	'B廳');

DROP TABLE IF EXISTS `movie_order`;
CREATE TABLE `movie_order` (
  `order_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '場次編號',
  `hall_no` int(4) unsigned zerofill NOT NULL COMMENT '影廳編號',
  `start_time` varchar(6) NOT NULL COMMENT '開始時間',
  `movie_no` int(4) unsigned zerofill NOT NULL COMMENT '電影編號',
  PRIMARY KEY (`order_no`),
  UNIQUE KEY `hall_no_start_time` (`hall_no`,`start_time`),
  KEY `movie_no` (`movie_no`),
  KEY `time_no` (`hall_no`),
  CONSTRAINT `movie_order_ibfk_2` FOREIGN KEY (`movie_no`) REFERENCES `movie` (`movie_no`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `movie_order_ibfk_4` FOREIGN KEY (`hall_no`) REFERENCES `movie_hall` (`hall_no`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='電影場次';

INSERT INTO `movie_order` (`order_no`, `hall_no`, `start_time`, `movie_no`) VALUES
(0001,	0001,	'09:00',	0001),
(0002,	0001,	'11:00',	0002),
(0003,	0001,	'13:00',	0003),
(0004,	0001,	'15:00',	0004),
(0005,	0001,	'17:00',	0005),
(0006,	0002,	'08:00',	0001),
(0007,	0002,	'10:00',	0007),
(0008,	0002,	'12:00',	0008),
(0009,	0002,	'14:00',	0009),
(0010,	0002,	'16:00',	0010),
(0011,	0002,	'18:00',	0011),
(0012,	0003,	'09:00',	0012),
(0013,	0003,	'11:00',	0013),
(0014,	0003,	'13:00',	0014),
(0015,	0003,	'15:00',	0015),
(0016,	0003,	'17:00',	0016),
(0017,	0003,	'19:00',	0017),
(0018,	0004,	'08:00',	0018),
(0019,	0004,	'10:00',	0019),
(0020,	0004,	'12:00',	0020),
(0021,	0004,	'14:00',	0001),
(0022,	0004,	'16:00',	0015),
(0023,	0004,	'18:00',	0017);

DROP TABLE IF EXISTS `movie_style`;
CREATE TABLE `movie_style` (
  `style_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '類型編號',
  `style_name` varchar(10) NOT NULL COMMENT '類型名稱',
  PRIMARY KEY (`style_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='電影類型';

INSERT INTO `movie_style` (`style_no`, `style_name`) VALUES
(0001,	'動作'),
(0002,	'冒險'),
(0003,	'劇情'),
(0004,	'恐怖'),
(0005,	'喜劇'),
(0006,	'動畫');

DROP TABLE IF EXISTS `movie_theater`;
CREATE TABLE `movie_theater` (
  `theater_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '戲院編號',
  `theater_name` varchar(20) NOT NULL COMMENT '戲院名稱',
  `theater_place` varchar(20) NOT NULL COMMENT '戲院地點',
  PRIMARY KEY (`theater_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='戲院';

INSERT INTO `movie_theater` (`theater_no`, `theater_name`, `theater_place`) VALUES
(0001,	'杰哥影城@楠梓高科',	'高雄楠梓區'),
(0002,	'杰哥影城@高雄崛江',	'高雄崛江區'),
(0003,	'杰哥影城@高雄岡山',	'高雄岡山區'),
(0004,	'杰哥影城@高雄駁二',	'高雄駁二特區'),
(0005,	'杰哥影城@橋頭糖廠',	'高雄橋頭區');

-- 2015-06-04 12:17:09
