<div class="profile-card">

    <div class="profile-top">

        <div class="profile-avatar">

            👤

            <span class="online-badge"></span>

        </div>

        <div class="profile-info">

            <div class="member-badge">

                ⭐ Member Servio
            </div>

            <h3>
                Muhammad Nabil
            </h3>

            <p>
                muhammadnabil@email.com
            </p>

            <button
                class="edit-profile-btn"
                onclick="openEditProfileModal()">

                ✏️ Edit Profil

            </button>

        </div>

    </div>

    

</div>
<style>
    /* =========================
   PROFILE CARD
========================= */

.profile-card{

    max-width:1200px;

    margin:0 auto 25px;

    padding:30px;

    background:white;

    border-radius:28px;

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.04);
}

/* =========================
   TOP SECTION
========================= */

.profile-top{

    display:flex;

    align-items:center;

    gap:24px;
}

/* =========================
   AVATAR
========================= */

.profile-avatar{

    position:relative;

    width:110px;
    height:110px;

    border-radius:50%;

    background:
        linear-gradient(
            135deg,
            #FFF6EE,
            #FFE8D2
        );

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:52px;

    flex-shrink:0;
}

.online-badge{

    position:absolute;

    right:10px;
    bottom:10px;

    width:18px;
    height:18px;

    border-radius:50%;

    background:#22C55E;

    border:3px solid white;
}

/* =========================
   INFO
========================= */

.profile-info{

    flex:1;
}

.member-badge{

    width:fit-content;

    padding:6px 12px;

    border-radius:999px;

    background:#FFF6EE;

    color:#F08A28;

    font-size:12px;

    font-weight:700;

    margin-bottom:10px;
}

.profile-info h3{

    margin:0;

    font-size:30px;

    font-weight:800;

    color:#222;
}

.profile-info p{

    margin-top:8px;

    color:#777;

    font-size:15px;
}

/* =========================
   BUTTON
========================= */

.edit-profile-btn{

    margin-top:18px;

    height:44px;

    padding:0 18px;

    border:none;

    border-radius:12px;

    background:#FFF6EE;

    color:#F08A28;

    font-weight:700;

    cursor:pointer;

    transition:.3s ease;
}

.edit-profile-btn:hover{

    background:#F08A28;

    color:white;
}

/* =========================
   STATS
========================= */

.profile-stats{

    margin-top:28px;

    padding-top:24px;

    border-top:1px solid #F2F2F2;

    display:flex;

    justify-content:space-around;

    align-items:center;
}

.stat-item{

    text-align:center;
}

.stat-item strong{

    display:block;

    font-size:28px;

    font-weight:800;

    color:#222;
}

.stat-item span{

    color:#888;

    font-size:14px;
}

.stat-divider{

    width:1px;

    height:45px;

    background:#ECECEC;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .profile-card{

        margin:15px;

        padding:24px;
    }

    .profile-top{

        flex-direction:column;

        text-align:center;
    }

    .profile-info{

        display:flex;

        flex-direction:column;

        align-items:center;
    }

    .profile-info h3{

        font-size:24px;
    }

    .profile-stats{

        gap:15px;
    }

    .stat-item strong{

        font-size:22px;
    }

}
</style>