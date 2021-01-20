<?php
/**
 * The HTML5 Map
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amberadvocate
 */

?>


<div id="html5-map-container"></div>
<!-- /container -->

<script src="/wp-content/themes/amberadvocate/js/raphael-min.js"></script>
<script src="/wp-content/themes/amberadvocate/js/us-map-svg.js"></script>
<script>
  window.onload = function () {

    var region1Color = '#B61C1C';
    var region2Color = '#1B7E3B';
    var region3Color = '#CE6615';
    var region4Color = '#1954DB';
    var region5Color = '#5B3160';


    var R = Raphael("html5-map-container", 1000, 700),
      //attr = {
      //"fill": "#d3d3d3",
      //"stroke": "#fff",
      //"stroke-opacity": "1",
      //"stroke-linejoin": "round",
      //"stroke-miterlimit": "4",
      //"stroke-width": "0.75",
      //"stroke-dasharray": "none"
     //},

    // Region 1
    me = { "href": '/states/maine', "fill": region1Color, "title": "Maine", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ri = { "href": '/states/rhode-island', "fill": region1Color, "title": "Rhode Island", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ct = { "href": '/states/connecticut', "fill": region1Color, "title": "Connecticut", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    vt = { "href": '/states/vermont', "fill": region1Color, "title": "Vermont", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    nh = { "href": '/states/new-hampshire', "fill": region1Color, "title": "New Hampshire", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    nj = { "href": '/states/new-jersey', "fill": region1Color, "title": "New Jersey", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ny = { "href": '/states/new-york', "fill": region1Color, "title": "New York", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    pa = { "href": '/states/pennsylvania', "fill": region1Color, "title": "Pennsylvania", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ma = { "href": '/states/massachusetts', "fill": region1Color, "title": "Massachusetts", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    de = { "href": '/states/deleware', "fill": region1Color, "title": "Deleware", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    wv = { "href": '/states/west-virginia', "fill": region1Color, "title": "West Virginia", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },


    // Region 2
    md = { "href": '/states/maryland', "fill": region2Color, "title": "Maryland", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    dc = { "href": '/states/district-of-columbia', "fill": region2Color, "title": "District of Columbia", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    va = { "href": '/states/virginia', "fill": region2Color, "title": "Virginia", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    nc = { "href": '/states/north-carolina', "fill": region2Color, "title": "North Carolina", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    sc = { "href": '/states/south-carolina', "fill": region2Color, "title": "South Carolina", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ga = { "href": '/states/georgia', "fill": region2Color, "title": "Georgia", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    fl = { "href": '/states/florida', "fill": region2Color, "title": "Florida", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    tn = { "href": '/states/tennessee', "fill": region2Color, "title": "Tennessee", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ms = { "href": '/states/mississippi', "fill": region2Color, "title": "Mississippi", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    al = { "href": '/states/alabama', "fill": region2Color, "title": "Alabama", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },


    // Region 3
    nd = { "href": '/states/north-dakota', "fill": region3Color, "title": "North Dakota", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    sd = { "href": '/states/south-dakota', "fill": region3Color, "title": "South Dakota", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    mn = { "href": '/states/minnesota', "fill": region3Color, "title": "Minnesota", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ia = { "href": '/states/iowa', "fill": region3Color, "title": "Iowa", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    wi = { "href": '/states/wisconsin', "fill": region3Color, "title": "Wisconsin", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    il = { "href": '/states/illinois', "fill": region3Color, "title": "Illinois", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    mi = { "href": '/states/michigan', "fill": region3Color, "title": "Michigan", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ind = { "href": '/states/indiana', "fill": region3Color, "title": "Indiana", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    oh = { "href": '/states/ohio', "fill": region3Color, "title": "Ohio", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ky = { "href": '/states/kentucky', "fill": region3Color, "title": "Kentucky", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },

    // Region 4
    az = { "href": '/states/arizona', "fill": region4Color, "title": "Arizona", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    co = { "href": '/states/colorado', "fill": region4Color, "title": "Colorado", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    nm = { "href": '/states/new-mexico', "fill": region4Color, "title": "New Mexico", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ne = { "href": '/states/nebraska', "fill": region4Color, "title": "Nebraska", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ks = { "href": '/states/kansas', "fill": region4Color, "title": "Kansas", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ok = { "href": '/states/oklahoma', "fill": region4Color, "title": "Oklahoma", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    tx = { "href": '/states/texas', "fill": region4Color, "title": "Texas", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    mo = { "href": '/states/missouri', "fill": region4Color, "title": "Missouri", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ar = { "href": '/states/arkansas', "fill": region4Color, "title": "Arkansas", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    la = { "href": '/states/louisiana', "fill": region4Color, "title": "Louisiana", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },

    // Region 5
    ak = { "href": '/states/alaska', "fill": region5Color, "title": "Alaska", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    hi = { "href": '/states/hawaii', "fill": region5Color, "title": "Hawaii", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    wa = { "href": '/states/washington', "fill": region5Color, "title": "Washington", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    or = { "href": '/states/oregon', "fill": region5Color, "title": "Oregon", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ca = { "href": '/states/california', "fill": region5Color, "title": "California", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    nv = { "href": '/states/nevada', "fill": region5Color, "title": "Nevada", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    id = { "href": '/states/idaho', "fill": region5Color, "title": "Idaho", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    ut = { "href": '/states/utah', "fill": region5Color, "title": "Utah", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    mt = { "href": '/states/montana', "fill": region5Color, "title": "Montana", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },
    wy = { "href": '/states/wyoming', "fill": region5Color, "title": "Wyoming", "stroke": "#fff", "stroke-opacity": "1", "stroke-linejoin": "round", "stroke-miterlimit": "4", "stroke-width": "0.75", "stroke-dasharray": "none" },

    usRaphael = {};

    //Draw Map and store Raphael paths
    for (var state in usMap) {
      //usRaphael[state] = R.path(usMap[state]).attr(attr);

      // Region 1
      usRaphael.me = R.path(usMap.me).attr(me);
      usRaphael.ri = R.path(usMap.ri).attr(ri);
      usRaphael.ct = R.path(usMap.ct).attr(ct);
      usRaphael.vt = R.path(usMap.vt).attr(vt);
      usRaphael.nh = R.path(usMap.nh).attr(nh);
      usRaphael.nj = R.path(usMap.nj).attr(nj);
      usRaphael.ny = R.path(usMap.ny).attr(ny);
      usRaphael.pa = R.path(usMap.pa).attr(pa);
      usRaphael.ma = R.path(usMap.ma).attr(ma);
      usRaphael.de = R.path(usMap.de).attr(de);
      usRaphael.wv = R.path(usMap.wv).attr(wv);

      // Region 2
      usRaphael.md = R.path(usMap.md).attr(md);
      usRaphael.dc = R.path(usMap.dc).attr(dc);
      usRaphael.va = R.path(usMap.va).attr(va);
      usRaphael.nc = R.path(usMap.nc).attr(nc);
      usRaphael.sc = R.path(usMap.sc).attr(sc);
      usRaphael.ga = R.path(usMap.ga).attr(ga);
      usRaphael.fl = R.path(usMap.fl).attr(fl);
      usRaphael.tn = R.path(usMap.tn).attr(tn);
      usRaphael.ms = R.path(usMap.ms).attr(ms);
      usRaphael.al = R.path(usMap.al).attr(al);

      // Region 3
      usRaphael.nd = R.path(usMap.nd).attr(nd);
      usRaphael.sd = R.path(usMap.sd).attr(sd);
      usRaphael.mn = R.path(usMap.mn).attr(mn);
      usRaphael.ia = R.path(usMap.ia).attr(ia);
      usRaphael.wi = R.path(usMap.wi).attr(wi);
      usRaphael.il = R.path(usMap.il).attr(il);
      usRaphael.mi = R.path(usMap.mi).attr(mi);
      usRaphael.in = R.path(usMap.in).attr(ind);
      usRaphael.oh = R.path(usMap.oh).attr(oh);
      usRaphael.ky = R.path(usMap.ky).attr(ky);

      // Region 4
      usRaphael.az = R.path(usMap.az).attr(az);
      usRaphael.co = R.path(usMap.co).attr(co);
      usRaphael.nm = R.path(usMap.nm).attr(nm);
      usRaphael.ne = R.path(usMap.ne).attr(ne);
      usRaphael.ks = R.path(usMap.ks).attr(ks);
      usRaphael.ok = R.path(usMap.ok).attr(ok);
      usRaphael.tx = R.path(usMap.tx).attr(tx);
      usRaphael.mo = R.path(usMap.mo).attr(mo);
      usRaphael.ar = R.path(usMap.ar).attr(ar);
      usRaphael.la = R.path(usMap.la).attr(la);

      // Region 5
      usRaphael.ak = R.path(usMap.ak).attr(ak);
      usRaphael.hi = R.path(usMap.hi).attr(hi);
      usRaphael.wa = R.path(usMap.wa).attr(wa);
      usRaphael.or = R.path(usMap.or).attr(or);
      usRaphael.ca = R.path(usMap.ca).attr(ca);
      usRaphael.nv = R.path(usMap.nv).attr(nv);
      usRaphael.id = R.path(usMap.id).attr(id);
      usRaphael.ut = R.path(usMap.ut).attr(ut);
      usRaphael.mt = R.path(usMap.mt).attr(mt);
      usRaphael.wy = R.path(usMap.wy).attr(wy);

    }

    //Do Work on Map
    for (var state in usRaphael) {
      //usRaphael[state].color = Raphael.getColor();

      // Region 1
      usRaphael.me.color = region1Color;
      usRaphael.ri.color = region1Color;
      usRaphael.ct.color = region1Color;
      usRaphael.vt.color = region1Color;
      usRaphael.nh.color = region1Color;
      usRaphael.nj.color = region1Color;
      usRaphael.ny.color = region1Color;
      usRaphael.pa.color = region1Color;
      usRaphael.ma.color = region1Color;
      usRaphael.de.color = region1Color;
      usRaphael.wv.color = region1Color;

      // Region 2
      usRaphael.md.color = region2Color;
      usRaphael.dc.color = region2Color;
      usRaphael.va.color = region2Color;
      usRaphael.nc.color = region2Color;
      usRaphael.sc.color = region2Color;
      usRaphael.ga.color = region2Color;
      usRaphael.fl.color = region2Color;
      usRaphael.tn.color = region2Color;
      usRaphael.ms.color = region2Color;
      usRaphael.al.color = region2Color;

      // Region 3
      usRaphael.nd.color = region3Color;
      usRaphael.sd.color = region3Color;
      usRaphael.mn.color = region3Color;
      usRaphael.ia.color = region3Color;
      usRaphael.wi.color = region3Color;
      usRaphael.il.color = region3Color;
      usRaphael.mi.color = region3Color;
      usRaphael.in.color = region3Color;
      usRaphael.oh.color = region3Color;
      usRaphael.ky.color = region3Color;

      // Region 4
      usRaphael.az.color = region4Color;
      usRaphael.co.color = region4Color;
      usRaphael.nm.color = region4Color;
      usRaphael.ne.color = region4Color;
      usRaphael.ks.color = region4Color;
      usRaphael.ok.color = region4Color;
      usRaphael.tx.color = region4Color;
      usRaphael.mo.color = region4Color;
      usRaphael.ar.color = region4Color;
      usRaphael.la.color = region4Color;

      // Region 5
      usRaphael.ak.color = region5Color;
      usRaphael.hi.color = region5Color;
      usRaphael.wa.color = region5Color;
      usRaphael.or.color = region5Color;
      usRaphael.ca.color = region5Color;
      usRaphael.nv.color = region5Color;
      usRaphael.id.color = region5Color;
      usRaphael.ut.color = region5Color;
      usRaphael.mt.color = region5Color;
      usRaphael.wy.color = region5Color;

      (function (st, state) {

        st[0].style.cursor = "pointer";

        st[0].onmouseover = function () {
          st.animate({fill: "#d3d3d3"}, 100);
          st.toFront();
          R.safari();
        };

        st[0].onmouseout = function () {
          st.animate({fill: st.color}, 100);
          st.toFront();
          R.safari();
        };

        //st[0].onclick = function () {
        //  window.location.href = '/states/' + st.link;
        //}


      })(usRaphael[state], state);
    }

  };
</script>
