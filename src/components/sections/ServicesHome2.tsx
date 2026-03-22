"use client";

import { useRef } from "react";
import Link from "next/link";
import {
  motion,
  useScroll,
  useTransform,
  useMotionValue,
  useSpring,
} from "motion/react";
import { services } from "@/data/services";

/* ── Map service titles to their route slugs ── */
const serviceSlugMap: Record<string, string> = {
  Branding: "/services/branding",
  "Web Development": "/services/website-development",
  "Graphic Design": "/services/graphic-design",
  "Lead Generation": "/services/lead-generation",
  "Social Media Marketing": "/services/social-media",
  "Google Ads": "/services/google-ads",
  "SEO Marketing": "/services/seo",
  "Link Building": "/services/link-building",
  "Meta Ads": "/services/meta-ads",
  "Content Writing": "/services/content-writing",
  "GMB Listing": "/services/gmb-listing",
  "Technical SEO": "/services/technical-seo",
};

const ease = [0.23, 1, 0.32, 1] as const;

/* ── Minimal SVG icons per service (clean line style) ── */
const serviceIcons: Record<string, React.ReactNode> = {
  Branding: (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
      <circle cx="12" cy="12" r="10" />
      <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
      <path d="M2 12h20" />
    </svg>
  ),
  "Web Development": (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
      <polyline points="16 18 22 12 16 6" />
      <polyline points="8 6 2 12 8 18" />
    </svg>
  ),
  "Graphic Design": (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
      <path d="M12 19l7-7 3 3-7 7-3-3z" />
      <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z" />
      <path d="M2 2l7.586 7.586" />
      <circle cx="11" cy="11" r="2" />
    </svg>
  ),
  "Lead Generation": (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
      <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
    </svg>
  ),
  "Social Media Marketing": (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
      <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
      <path d="M13.73 21a2 2 0 0 1-3.46 0" />
    </svg>
  ),
  "Google Ads": (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
      <circle cx="11" cy="11" r="8" />
      <line x1="21" y1="21" x2="16.65" y2="16.65" />
    </svg>
  ),
  "SEO Marketing": (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
      <line x1="12" y1="20" x2="12" y2="10" />
      <line x1="18" y1="20" x2="18" y2="4" />
      <line x1="6" y1="20" x2="6" y2="16" />
    </svg>
  ),
  "Link Building": (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
      <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
      <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
    </svg>
  ),
  "Meta Ads": (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
      <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
    </svg>
  ),
  "Content Writing": (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
      <path d="M12 20h9" />
      <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
    </svg>
  ),
  "GMB Listing": (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
      <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
      <circle cx="12" cy="10" r="3" />
    </svg>
  ),
  "Technical SEO": (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
      <circle cx="12" cy="12" r="3" />
      <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" />
    </svg>
  ),
};

/* ── Service Row Component ── */
function ServiceRow({ service, index }: { service: (typeof services)[0]; index: number }) {
  const arrowX = useMotionValue(0);
  const springX = useSpring(arrowX, { stiffness: 300, damping: 20 });

  return (
    <motion.div
      initial={{ opacity: 0, y: 24 }}
      whileInView={{ opacity: 1, y: 0 }}
      viewport={{ once: true, amount: 0.3 }}
      transition={{
        duration: 0.7,
        delay: index * 0.04,
        ease,
      }}
      onHoverStart={() => arrowX.set(6)}
      onHoverEnd={() => arrowX.set(0)}
      className="group relative cursor-pointer"
    >
      {/* Shimmer divider line */}
      <div className="relative h-px w-full overflow-hidden">
        <div className="absolute inset-0 bg-white/[0.06]" />
        <motion.div
          className="absolute inset-y-0 w-1/3 bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"
          initial={{ x: "-100%" }}
          whileInView={{ x: "400%" }}
          viewport={{ once: true }}
          transition={{
            duration: 2,
            delay: 0.3 + index * 0.08,
            ease: "easeInOut",
          }}
        />
      </div>

      {/* Row content */}
      <div className="relative overflow-hidden rounded-lg my-0">
        {/* Left accent border that slides in on hover */}
        <motion.div
          className="absolute left-0 top-0 bottom-0 w-[2px] bg-[#ff4500] origin-top"
          initial={{ scaleY: 0 }}
          whileHover={{ scaleY: 1 }}
          transition={{ duration: 0.3, ease }}
        />
        <div
          className="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"
          style={{
            background:
              "linear-gradient(90deg, rgba(255,69,0,0.04) 0%, rgba(255,69,0,0.01) 30%, transparent 60%)",
          }}
        />

        <div className="relative flex flex-col md:flex-row md:items-center justify-between gap-4 px-5 py-6 md:py-8">
          <div className="flex items-center gap-5">
            {/* Number */}
            <motion.span
              className="text-[11px] text-white/20 font-mono tabular-nums w-6 shrink-0 group-hover:text-[#ff4500]/70 transition-colors duration-300"
              whileHover={{ scale: 1.15 }}
              transition={{ type: "spring", stiffness: 400, damping: 15 }}
            >
              {String(index + 1).padStart(2, "0")}
            </motion.span>

            {/* Icon */}
            <span className="text-white/20 group-hover:text-[#ff4500]/60 transition-colors duration-300 shrink-0">
              {serviceIcons[service.title] ?? (
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5">
                  <circle cx="12" cy="12" r="10" />
                </svg>
              )}
            </span>

            {/* Title */}
            <h3 className="text-lg md:text-xl font-medium text-white/90 tracking-tight group-hover:text-white transition-colors duration-300">
              {service.title}
            </h3>
          </div>

          <div className="flex items-center gap-5 md:gap-6">
            {/* Description */}
            <p className="text-sm text-white/30 max-w-md leading-relaxed md:text-right group-hover:text-white/55 transition-colors duration-400">
              {service.description}
            </p>

            {/* Animated arrow */}
            <motion.span
              className="text-[#ff4500] text-base shrink-0 hidden md:inline opacity-0 group-hover:opacity-100 transition-opacity duration-300"
              style={{ x: springX }}
            >
              &#8594;
            </motion.span>
          </div>
        </div>
      </div>
    </motion.div>
  );
}

/* ── Main Section ── */
export function ServicesHome2() {
  const sectionRef = useRef<HTMLElement>(null);
  const headingRef = useRef<HTMLDivElement>(null);

  /* Parallax for heading */
  const { scrollYProgress } = useScroll({
    target: sectionRef,
    offset: ["start end", "end start"],
  });
  const headingY = useTransform(scrollYProgress, [0, 1], [40, -40]);

  return (
    <section
      id="services"
      ref={sectionRef}
      className="relative w-full px-6 py-16 md:py-24 lg:py-32 lg:px-12 bg-[#080808] overflow-hidden"
    >
      {/* ── Floating gradient orb for depth ── */}
      <div className="pointer-events-none absolute inset-0">
        <motion.div
          className="absolute -top-40 -right-40 w-[600px] h-[600px] rounded-full"
          style={{
            background:
              "radial-gradient(circle, rgba(255,69,0,0.06) 0%, rgba(255,69,0,0.02) 40%, transparent 70%)",
          }}
          animate={{
            x: [0, 30, 0],
            y: [0, -20, 0],
          }}
          transition={{
            duration: 12,
            repeat: Infinity,
            ease: "easeInOut",
          }}
        />
        <motion.div
          className="absolute -bottom-60 -left-40 w-[500px] h-[500px] rounded-full"
          style={{
            background:
              "radial-gradient(circle, rgba(255,69,0,0.04) 0%, transparent 60%)",
          }}
          animate={{
            x: [0, -20, 0],
            y: [0, 25, 0],
          }}
          transition={{
            duration: 15,
            repeat: Infinity,
            ease: "easeInOut",
          }}
        />
      </div>

      <div className="relative mx-auto max-w-7xl">
        {/* ── Label ── */}
        <motion.p
          initial={{ opacity: 0, y: 14 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true, amount: 0.5 }}
          transition={{ duration: 0.6, ease }}
          className="text-[10px] md:text-xs text-white/40 tracking-[0.2em] uppercase font-semibold mb-8"
        >
          What we do
        </motion.p>

        {/* ── Heading with parallax ── */}
        <div ref={headingRef} className="relative mb-20">
          <motion.h2
            initial={{ opacity: 0, y: 28 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true, amount: 0.3 }}
            transition={{ duration: 0.9, delay: 0.1, ease }}
            style={{ y: headingY }}
            className="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-medium leading-[1.08] tracking-tight text-white max-w-3xl"
          >
            Every service you need{" "}
            <span className="text-white/40 italic">under one roof.</span>
          </motion.h2>

          {/* Service count badge */}
          <motion.div
            initial={{ opacity: 0, scale: 0.8 }}
            whileInView={{ opacity: 1, scale: 1 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6, delay: 0.4, ease }}
            className="mt-6 inline-flex items-center gap-2 bg-white/[0.03] border border-white/[0.06] rounded-full px-4 py-1.5"
          >
            <span className="w-1.5 h-1.5 rounded-full bg-[#ff4500]" />
            <span className="text-xs text-white/40 font-medium tracking-wide">
              {services.length} services
            </span>
          </motion.div>
        </div>

        {/* ── Services list with stagger ── */}
        <motion.div
          initial="hidden"
          whileInView="visible"
          viewport={{ once: true, amount: 0.05 }}
          variants={{
            hidden: {},
            visible: {
              transition: {
                staggerChildren: 0.06,
              },
            },
          }}
        >
          {services.map((service, i) => (
            <Link
              key={service.title}
              href={serviceSlugMap[service.title] || "/services"}
              className="block"
            >
              <ServiceRow service={service} index={i} />
            </Link>
          ))}

          {/* Bottom shimmer divider */}
          <div className="relative h-px w-full overflow-hidden">
            <div className="absolute inset-0 bg-white/[0.06]" />
            <motion.div
              className="absolute inset-y-0 w-1/3 bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"
              initial={{ x: "-100%" }}
              whileInView={{ x: "400%" }}
              viewport={{ once: true }}
              transition={{
                duration: 2,
                delay: 0.3 + services.length * 0.08,
                ease: "easeInOut",
              }}
            />
          </div>
        </motion.div>
      </div>

      {/* JSON-LD ItemList schema for services */}
      <script
        type="application/ld+json"
        dangerouslySetInnerHTML={{
          __html: JSON.stringify({
            "@context": "https://schema.org",
            "@type": "ItemList",
            name: "TML Agency Digital Marketing Services",
            numberOfItems: services.length,
            itemListElement: services.map((s, i) => ({
              "@type": "ListItem",
              position: i + 1,
              name: s.title,
              description: s.description,
              url: `https://townmedialabs.com/services/${s.title.toLowerCase().replace(/\s+/g, "-")}`,
            })),
          }),
        }}
      />
    </section>
  );
}
