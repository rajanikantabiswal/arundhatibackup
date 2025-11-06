<html>
    <tittle>Tab Responsive</tittle>
    <head>
        <style>
            ul{
                list-style:none;
            }
            .site{
                height:100vh;
            }
            .tabbed{
                background-color:#fff;
                max-width:800px;
                margin:0 auto;
                display:flex;
            }
            .tabbed nav ul{
                display:flex;
                flex-direction:column;
                justify-content:space-between;
                background-color:#f7f7f7;
            }
            .tabbed nav li{
                position:relative;
                width:100%;
            }
            .tabbed nav label{
                display:flex;
                flex-direction:column;
                align-items:center;
                justify-content:space-evenly;
                color:#aaa;
                height:80px;
                font-weight:800;
                padding:10px;
                position:relative;
                cursor:pointer;
                -webkit-tap-highlight-color:rgba(0,0,0,0);
            }
            .tabbed > input{
                display:none;
            }
            .tabbed nav li span{
                color: #505050;
            }
            .tabbed nav li label:hover{
                /* color:#ac7df3; */
            }
            .content{
                padding:60px;
            }
            .content > div{
                display:none;
                animation: text-fade .5s;
            }
            @keyframes text-fade{
                0%{
                    opacity:0;
                }
                100%{
                    opacity:1;
                }
            }
            input#recent:checked ~ .content .recent ,
            input#pending:checked ~ .content .pending ,
            input#complete:checked ~ .content .complete ,
            input#refunded:checked ~ .content .refunded ,
            input#payout:checked ~ .content .payout {
                display:block;
            }

            input#recent:checked ~ nav li.recent ,
            input#pending:checked ~ nav li.pending ,
            input#complete:checked ~ nav li.complete ,
            input#refunded:checked ~ nav li.refunded ,
            input#payout:checked ~ nav li.payout {
                background-color:#fff;
            }
            .tabbed nav li::before{
                content:'';
                position:absolute;
                width:80px;
                height:30px;
                border-radius:40px;
                /* background-color:#e7dafc; */
                left:-80px;
                top:10px;
                margin-left:-20px;
                transition: all .3s ease-out;
                -webkit-transition: all .3s ease-out;
            }
            input#recent:checked ~ nav li.recent::before ,
            input#pending:checked ~ nav li.pending::before ,
            input#complete:checked ~ nav li.complete::before ,
            input#refunded:checked ~ nav li.refunded::before ,
            input#payout:checked ~ nav li.payout::before {
                left:-20px;
            }
            input#recent:checked ~ nav li.recent::before ,
            input#pending:checked ~ nav li.pending::before ,
            input#complete:checked ~ nav li.complete::before ,
            input#refunded:checked ~ nav li.refunded::before ,
            input#payout:checked ~ nav li.payout::before {
                top:-40px;
            }
            @media screen and (min-width:768px){
                .tabbed{
                    flex-direction:column;
                }
                .tabbed nav ul{
                    flex-direction:row;
                }
                .tabbed nav li::before{
                    width:40px;
                    height:80px;
                    left:50%;
                    top:-80px;
                    margin-left:-20px;

                }
            }
        </style>
    </head>
    <body>
        <div id="page" class="site">
            <div class="tabbed">
                <input type="radio" name="content" id="recent">
                <input type="radio" name="content" id="pending">
                <input type="radio" name="content" id="complete">
                <input type="radio" name="content" id="refunded">
                <input type="radio" name="content" id="payout">
                <div class="nav"></div>
                <nav>
                    <ul>
                        <li class="recent"><label for="recent"><span>Recent</span></label></li>
                        <li class="pending"><label for="pending"><span>Pending</span></label></li>
                        <li class="complete"><label for="complete"><span>Complete</span></label></li>
                        <li class="refunded"><label for="refunded"><span>Refunded</span></label></li>
                        <li class="payout"><label for="payout"><span>Payout</span></label></li>
                    </ul>
                </nav>
                <div class="content">
                    <div class="recent">
                        <h3>dfhgfdhgfdg</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero facere dicta 
                            totam, laborum ullam sint, molestiae adipisci quisquam quibusdam odio 
                            reprehenderit amet velit pariatur provident nisi ipsam animi atque. Tempore iste 
                            maxime facilis, aliquid non neque sapiente earum perspiciatis, dolore assumenda 
                            sint velit inventore explicabo laboriosam quam quasi dolores perferendis?
                        </p>
                    </div>

                    <div class="pending">
                        <h3>pending</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero facere dicta 
                            totam, laborum ullam sint, molestiae adipisci quisquam quibusdam odio 
                            reprehenderit amet velit pariatur provident nisi ipsam animi atque. Tempore iste 
                            maxime facilis, aliquid non neque sapiente earum perspiciatis, dolore assumenda 
                            sint velit inventore explicabo laboriosam quam quasi dolores perferendis?
                        </p>
                    </div>

                    <div class="complete">
                        <h3>complete</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero facere dicta 
                            totam, laborum ullam sint, molestiae adipisci quisquam quibusdam odio 
                            reprehenderit amet velit pariatur provident nisi ipsam animi atque. Tempore iste 
                            maxime facilis, aliquid non neque sapiente earum perspiciatis, dolore assumenda 
                            sint velit inventore explicabo laboriosam quam quasi dolores perferendis?
                        </p>
                    </div>

                    <div class="refunded">
                        <h3>refunded</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero facere dicta 
                            totam, laborum ullam sint, molestiae adipisci quisquam quibusdam odio 
                            reprehenderit amet velit pariatur provident nisi ipsam animi atque. Tempore iste 
                            maxime facilis, aliquid non neque sapiente earum perspiciatis, dolore assumenda 
                            sint velit inventore explicabo laboriosam quam quasi dolores perferendis?
                        </p>
                    </div>

                    <div class="payout">
                        <h3>payout</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero facere dicta 
                            totam, laborum ullam sint, molestiae adipisci quisquam quibusdam odio 
                            reprehenderit amet velit pariatur provident nisi ipsam animi atque. Tempore iste 
                            maxime facilis, aliquid non neque sapiente earum perspiciatis, dolore assumenda 
                            sint velit inventore explicabo laboriosam quam quasi dolores perferendis?
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>