<html><head>
    <title>Mail-reset</title>
    <style type="text/css">
        body {
            font-size: 16px;
        }
    </style></head>
    
    <body>
    
        <section style="margin-bottom: 30px;margin-top: 30px;">
            <div style="background-color: #999acc;color: #fff;padding: 35px 35px;"><h2>wellcome</h2></div>
        </section>
    
        <section style="margin-bottom: 30px;">
            <div style="width: 150px;margin: auto;">
                <img src="{{asset("uploads/Home.png")}}" style="width: 100%;">
            </div>
        </section>
    
        <section style="margin-bottom: 30px;">
            <p>สวัสดีคุณ {{$name}}</p>
            <p>ยินดีต้อนรับเข้าสู่เว็บไซต์ holidayinn</p>
            <p>คุณสามารถใช้บัญชีที่คุณสมัครเข้าสู่ระบบได้ทันที <a href="{{url('ActivateEmail/'.$token)}}">ที่นี่</a> และใช้ข้อมูลด้านล่างในการเข้าสู่ระบบ</p>
        </section>
        <section style="margin-bottom: 30px;">
            <ul>
                <li>Username : <a href="">{{$email}}</a></li>
                <li>Password : “รหัสผ่านที่คุณกรอกเพื่อสมัครสมาชิก”</li>
            </ul>
        </section>
        <section style="margin-bottom: 150px;">
            <p>หากคุณลืมรหัสผ่านในการเข้าสู่ระบบ? โปรดคลิก <a href="#">ลืมรหัสผ่าน</a></p>
        </section>
        <section style="">
            <p>หากท่านมีข้อสงสัยประการใดหรือต้องการสอบถามข้อมูลเพิ่มเติม</p>
            <ul>
                <li>โทร : 097-280-1272</li>
                <li>E-mail: info@holidayinn.com</li>
            </ul>
        </section>
    
    
    </body></html>
    